const shell = document.getElementById("shell");
const ovBg = document.getElementById("overlay-bg");
const ovTitle = document.getElementById("ov-title");
const ovDesc = document.getElementById("ov-desc");
const viewIn = document.getElementById("view-signin");
const viewUp = document.getElementById("view-signup");
const DUR = 700;

const DATA = {
  signin: {
    title: "Welcome Back!",
    desc: "Masuk ke akun Anda untuk mengakses dashboard dan fitur-fitur eksklusif platform kami.",
    bg: "linear-gradient(160deg,rgba(26,26,110,.85) 0%,rgba(79,70,229,.78) 45%,rgba(124,58,237,.72) 100%),url('/images/bg-r.png') center/cover no-repeat",
  },
  signup: {
    title: "Welcome!",
    desc: "Daftar sekarang dan nikmati berbagai keuntungan eksklusif dari platform kami.",
    bg: "linear-gradient(145deg,rgba(45,45,181,.85) 0%,rgba(79,70,229,.78) 35%,rgba(124,58,237,.72) 70%,rgba(74,14,143,.85) 100%),url('/images/bg-r.png') center/cover no-repeat",
  },
};

// ── Animasi slide overlay ─────────────────────────────────────
function switchTo(mode) {
  const toSignup = mode === "signup";

  ovTitle.style.opacity = "0";
  ovTitle.style.transform = "translateY(8px)";
  ovDesc.style.opacity = "0";
  ovDesc.style.transform = "translateY(8px)";

  shell.classList.toggle("active", toSignup);

  setTimeout(() => {
    const d = DATA[mode];
    ovBg.style.background = d.bg;
    ovTitle.textContent = d.title;
    ovDesc.textContent = d.desc;

    viewIn.classList.toggle("hidden", toSignup);
    viewUp.classList.toggle("hidden", !toSignup);

    requestAnimationFrame(() => {
      ovTitle.style.opacity = "1";
      ovTitle.style.transform = "translateY(0)";
      ovDesc.style.opacity = "1";
      ovDesc.style.transform = "translateY(0)";
    });
  }, DUR / 2);
}

document.getElementById("go-signup").addEventListener("click", (e) => {
  e.preventDefault();
  switchTo("signup");
});
document.getElementById("go-signin").addEventListener("click", (e) => {
  e.preventDefault();
  switchTo("signin");
});

[ovTitle, ovDesc].forEach((el) => {
  el.style.transition = "opacity .3s ease, transform .3s ease";
});

// ── Toggle password visibility ────────────────────────────────
function togglePw(id) {
  const inp = document.getElementById(id);
  const isPassword = inp.type === "password";
  inp.type = isPassword ? "text" : "password";

  const eye = inp.nextElementSibling;
  eye.innerHTML = isPassword
    ? `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>`
    : `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>`;
}

// ── Helper: buat & tampilkan pesan error/sukses ───────────────
function createMsgEl(beforeEl) {
  const el = document.createElement("p");
  el.style.cssText = `
        text-align: center;
        font-size: .83rem;
        font-weight: 600;
        margin-bottom: 8px;
        min-height: 1.2em;
        transition: opacity .2s;
    `;
  beforeEl.insertAdjacentElement("beforebegin", el);
  return el;
}

function showMsg(el, text, isError = true) {
  el.textContent = text;
  el.style.color = isError ? "#dc2626" : "#16a34a";
  el.style.opacity = "1";
}

function clearMsg(el) {
  el.style.opacity = "0";
  setTimeout(() => {
    el.textContent = "";
  }, 200);
}

// ── LOGIN ─────────────────────────────────────────────────────
const btnSignin = document.getElementById("btn-signin");
const msgSignin = createMsgEl(btnSignin);

btnSignin.addEventListener("click", async function (e) {
  e.preventDefault();
  clearMsg(msgSignin);

  const email = document
    .querySelector('#view-signin input[name="email"]')
    .value.trim();
  const password = document.querySelector(
    '#view-signin input[name="password"]',
  ).value;

  if (!email || !password) {
    return showMsg(msgSignin, "Email dan kata sandi wajib diisi.");
  }

  btnSignin.disabled = true;
  btnSignin.textContent = "Memproses...";

  const formData = new FormData();
  formData.append("email", email);
  formData.append("password", password);

  try {
    formData.append(
      "_token",
      document.querySelector('meta[name="csrf-token"]').content,
    );
    const res = await fetch("/auth/login", {
      method: "POST",
      body: formData,
    });
    const data = await res.json();

    if (data.success) {
      showMsg(msgSignin, data.message, false);
      setTimeout(() => {
        window.location.href = data.redirect;
      }, 1000);
    } else {
      showMsg(msgSignin, data.message);
    }
  } catch (err) {
    console.log(err); // tambah ini
    showMsg(msgSignin, "Terjadi kesalahan. Coba lagi.");
  } finally {
    btnSignin.disabled = false;
    btnSignin.textContent = "Masuk";
  }
});

// ── REGISTER ──────────────────────────────────────────────────
const btnSignup = document.querySelector(".btn-signup");
const msgSignup = createMsgEl(btnSignup);

btnSignup.addEventListener("click", async function (e) {
  e.preventDefault();
  clearMsg(msgSignup);

  const nama = document
    .querySelector('#view-signup input[name="nama"]')
    .value.trim();
  const email = document
    .querySelector('#view-signup input[name="email"]')
    .value.trim();
  const password = document.getElementById("pw2").value;
  const konfirm = document.getElementById("pw3").value;

  if (!nama || !email || !password || !konfirm) {
    return showMsg(msgSignup, "Semua kolom wajib diisi.");
  }
  if (password !== konfirm) {
    return showMsg(msgSignup, "Konfirmasi kata sandi tidak cocok.");
  }
  if (password.length < 8) {
    return showMsg(msgSignup, "Kata sandi minimal 8 karakter.");
  }

  btnSignup.disabled = true;
  btnSignup.textContent = "Memproses...";

  const formData = new FormData();
  formData.append("nama", nama);
  formData.append("email", email);
  formData.append("password", password);
  formData.append("confirm_password", konfirm);

  try {
    formData.append(
      "_token",
      document.querySelector('meta[name="csrf-token"]').content,
    );
    const res = await fetch("/auth/register", {
      method: "POST",
      body: formData,
    });
    const data = await res.json();

    if (data.success) {
      showMsg(msgSignup, data.message, false);
      setTimeout(() => switchTo("signin"), 1500);
    } else {
      showMsg(msgSignup, data.message);
    }
  } catch (err) {
    showMsg(msgSignup, "Terjadi kesalahan. Coba lagi.");
  } finally {
    btnSignup.disabled = false;
    btnSignup.textContent = "Daftar Sekarang";
  }
});
