/* ==========================
   فتح وإغلاق المودالات
========================== */

// تسجيل
function openRegisterModal() {
    document.getElementById("registerModal").style.display = "flex";
}
function closeRegisterModal() {
    document.getElementById("registerModal").style.display = "none";
}

// تسجيل الدخول
function openLoginModal() {
    document.getElementById("loginModal").style.display = "flex";
}
function closeLoginModal() {
    document.getElementById("loginModal").style.display = "none";
}

// الحجز
function openBookingModal() {
    document.getElementById("bookingModal").style.display = "flex";
}
function closeBookingModal() {
    document.getElementById("bookingModal").style.display = "none";
}

/* ==========================
   التأكد من تسجيل الدخول قبل الحجز
========================== */
function checkLoginAndBook() {
    if (localStorage.getItem("loggedIn") === "true") {
        openBookingModal();
    } else {
        openLoginModal();
    }
}

/* ==========================
   إرسال بيانات التسجيل
========================== */
if (document.getElementById("registerForm")) {
    document.getElementById("registerForm").addEventListener("submit", function(e){
        e.preventDefault();

        let form = new FormData(this);

        fetch("register.php", {
            method: "POST",
            body: form
        })
        .then(res => res.json())
        .then(data => {
            let msg = document.getElementById("registerSuccess");
            let err = document.getElementById("registerError");

            if(data.success){
                msg.style.display = "block";
                err.style.display = "none";

                setTimeout(() => {
                    closeRegisterModal();
                    this.reset();
                }, 1200);

            } else {
                err.innerText = data.message;
                err.style.display = "block";
                msg.style.display = "none";
            }
        });
    });
}

/* ==========================
   تسجيل الدخول
========================== */
if (document.getElementById("loginForm")) {
    document.getElementById("loginForm").addEventListener("submit", function(e){
        e.preventDefault();

        let form = new FormData(this);

        fetch("login.php", {
            method: "POST",
            body: form
        })
        .then(res => res.json())
        .then(data => {
            let msg = document.getElementById("loginSuccess");
            let err = document.getElementById("loginError");

            if(data.success){
                msg.style.display = "block";
                err.style.display = "none";

                localStorage.setItem("loggedIn", "true");

                setTimeout(() => {
                    closeLoginModal();
                    this.reset();
                }, 1200);

            } else {
                err.innerText = data.message;
                err.style.display = "block";
                msg.style.display = "none";
            }
        });
    });
}

/* ==========================
   إرسال بيانات الحجز
========================== */
if (document.getElementById("bookingForm")) {
    document.getElementById("bookingForm").addEventListener("submit", function(e){
        e.preventDefault();

        let form = new FormData(this);

        fetch("book.php", {
            method: "POST",
            body: form
        })
        .then(res => res.text())
        .then(data => {
            let msg = document.getElementById("successMsg");
            let err = document.getElementById("errorMsg");

            if (data.trim() === "success") {
                msg.style.display = "block";
                err.style.display = "none";

                setTimeout(() => {
                    closeBookingModal();
                    this.reset();
                }, 1200);

            } else {
                err.innerText = "حدث خطأ أثناء إرسال البيانات";
                err.style.display = "block";
                msg.style.display = "none";
            }
        });
    });
}
