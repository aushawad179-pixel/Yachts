<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueWave</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="nav-links">
            <a href="#home">الرئيسية</a>
            <a href="#offers">العروض</a>
            <a href="#about">من نحن</a>
            <a href="#services">خدماتنا</a>
            <a href="#contact">تواصل معنا</a>
            <button class="btn-login" onclick="openLoginModal()">تسجيل الدخول</button>
        </div>
        <div class="logo">
            <img src="images/logoo.jpg" alt="Logo" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'color:white;font-size:24px;font-weight:bold;\'>شعار الشركة</div>'">
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeLoginModal()">&times;</span>
            <h2>تسجيل الدخول</h2>
            <div id="loginSuccess" class="success-message">تم تسجيل الدخول بنجاح!</div>
            <div id="loginError" class="error-message"></div>
            <form id="loginForm">
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="login_email" required>
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="login_password" required>
                </div>
                <button type="submit" class="btn-submit">تسجيل الدخول</button>
                <button type="button" class="btn-submit btn-secondary" onclick="openRegisterModal()">إنشاء حساب جديد</button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeRegisterModal()">&times;</span>
            <h2>إنشاء حساب جديد</h2>
            <div id="registerSuccess" class="success-message">تم إنشاء الحساب بنجاح!</div>
            <div id="registerError" class="error-message"></div>
            <form id="registerForm">
                <!-- ✅ إضافة حقل الاسم -->
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" name="register_name" required>
                </div>
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="register_email" required>
                </div>
                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="tel" name="register_phone" required>
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="register_password" required minlength="6">
                </div>
                <div class="form-group">
                    <label>الجنس</label>
                    <select name="register_gender" required>
                        <option value="">اختر الجنس</option>
                        <option value="ذكر">ذكر</option>
                        <option value="أنثى">أنثى</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>تاريخ الميلاد</label>
                    <input type="date" name="register_birthdate" required>
                </div>
                <button type="submit" class="btn-submit">إنشاء حساب</button>
            </form>
        </div>
    </div>

    <!-- ========== الصفحة الرئيسية ========== -->
    <section id="home">
        <div class="home-container">
            <video class="video-background" autoplay loop muted playsinline>
                <source src="videos/back.mp4" type="video/mp4">
            </video>

            <div class="overlay"></div>

            <div class="content">

                <h1>ألق بمراسي التفكير واستمتع بسحر الابحار معنا</h1>
                <h2>استمتع برحلات فاخرة وتجربة بحرية لا تنسى</h2>
                <button class="btn-book" onclick="openBookingModel()">احجز الآن</button>
            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeBookingModal()">&times;</span>
            <h2>نموذج الحجز</h2>
            <div id="successMsg" class="success-message">تم إرسال البيانات بنجاح!</div>
            <div id="errorMsg" class="error-message"></div>
            <form id="bookingForm">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="tel" name="phone" required>
                </div>
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>اسم اليخت المطلوب</label>
                    <select name="yacht_name" required>
                        <option value="">اختر اليخت</option>
                        <option value="يخت الفخامة">يخت الفخامة</option>
                        <option value="يخت الأناقة">يخت الأناقة</option>
                        <option value="يخت الملكي">يخت الملكي</option>
                        <option value="يخت الأحلام">يخت الأحلام</option>
                        <option value="يخت العيد ميلاد">يخت العيد ميلاد</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>عدد الساعات</label>
                    <input type="number" name="hours" min="1" required>
                </div>
                <div class="form-group">
                    <label>تاريخ الحجز</label>
                    <input type="date" name="booking_date" required>
                </div>
                <button type="submit" class="btn-submit">إرسال البيانات</button>
            </form>
        </div>
    </div>

    <!-- ========== صفحة العروض ========== -->
    <section id="offers">
        <div class="offers-container">
            <h1 class="offers-title">العروض المتاحة</h1>
            <div class="yachts-grid">
                <!-- يخت الفخامة -->
                <div class="yacht-card">
                    <div class="yacht-image">
                        <img src="images/yacht1.jpg" alt="يخت الفخامة">
                    </div>
                    <div class="yacht-info">
                        <h3 class="yacht-name">يخت الفخامة</h3>
                        <p class="yacht-price">السعر: 500 ريال/ساعة</p>
                        <p class="yacht-discount">خصم 20% عند الحجز اكثر من 3 ساعات</p>
                        <button class="btn-details" onclick="document.getElementById('modal-fakhamah').style.display='flex'">
                            عرض الصور الداخلية
                        </button>
                    </div>
                </div>

                <!-- يخت الأناقة -->
                <div class="yacht-card">
                    <div class="yacht-image">
                        <img src="images/yacht2.jpg" alt="يخت الاناقة">
                    </div>
                    <div class="yacht-info">
                        <h3 class="yacht-name">يخت الأناقة</h3>
                        <p class="yacht-price">السعر: 650 ريال/ساعة</p>
                        <p class="yacht-discount">خصم 20% عند الحجز اكثر من 3 ساعات</p>
                        <button class="btn-details" onclick="document.getElementById('modal-anaqah').style.display='flex'">
                            عرض الصور الداخلية
                        </button>
                    </div>
                </div>

                <!-- يخت الملكي -->
                <div class="yacht-card">
                    <div class="yacht-image">
                        <img src="images/yacht3.jpg" alt="يخت الملكيي">
                    </div>
                    <div class="yacht-info">
                        <h3 class="yacht-name">يخت الملكي</h3>
                        <p class="yacht-price">السعر: 800 ريال/ساعة</p>
                        <p class="yacht-discount">خصم 20% عند الحجز اكثر من 3 ساعات</p>
                        <button class="btn-details" onclick="document.getElementById('modal-malaki').style.display='flex'">
                            عرض الصور الداخلية
                        </button>
                    </div>
                </div>

                <!-- يخت الأحلام -->
                <div class="yacht-card">
                    <div class="yacht-image">
                        <img src="images/yacht4.jpg" alt="يخت الأحلام">
                    </div>
                    <div class="yacht-info">
                        <h3 class="yacht-name">يخت الأحلام</h3>
                        <p class="yacht-price">السعر: 950 ريال/ساعة</p>
                        <p class="yacht-discount">خصم 20% عند الحجز اكثر من 3 ساعات</p>
                        <button class="btn-details" onclick="document.getElementById('modal-ahlam').style.display='flex'">
                            عرض الصور الداخلية
                        </button>
                    </div>
                </div>

                <!-- يخت عيد الميلاد -->
                <div class="yacht-card">
                    <div class="yacht-image">
                        <img src="images/yachtb.jpg" alt="يخت عيد الميلاد">
                    </div>
                    <div class="yacht-info">
                        <h3 class="yacht-name">يخت العيد ميلاد</h3>
                        <p class="yacht-price">السعر: 1000 ريال/ساعة</p>
                        <p class="yacht-discount">خصم 20% عند الحجز اكثر من 3 ساعات</p>
                        <button class="btn-details" onclick="document.getElementById('modal-birthday').style.display='flex'">
                            عرض الصور الداخلية
                        </button>
                    </div>
                </div>

                <div class="reviews-section">
                    <div class="stars">★★★★★</div>
                    <p class="review-text">تجربة ممتعة</p>
                    <p class="review-text">رحلات متميزة</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modals للصور الداخلية للـ Yachts -->
    <!-- Modal يخت الفخامة -->
    <div id="modal-fakhamah" class="details-modal" onclick="if(event.target==this) this.style.display='none'">
        <div class="details-content">
            <span class="close-modal" onclick="document.getElementById('modal-fakhamah').style.display='none'">&times;</span>
            <h2>يخت الفخامة - الصور الداخلية</h2>
            <div class="gallery">
                <div class="gallery-item"><img src="images/yacht1-1.jpg" alt="يخت الفخامة - داخلي 1"></div>
                <div class="gallery-item"><img src="images/yacht1-2.jpg" alt="يخت الفخامة - داخلي 2"></div>
                <div class="gallery-item"><img src="images/yacht1-3.jpg" alt="يخت الفخامة - داخلي 3"></div>
                <div class="gallery-item"><img src="images/yacht1-4.jpg" alt="يخت الفخامة - داخلي 4"></div>
                <div class="gallery-item"><img src="images/yacht1-5.jpg" alt="يخت الفخامة - داخلي 5"></div>
                <div class="gallery-item"><img src="images/yacht1-6.jpg" alt="يخت الفخامة - داخلي 6"></div>
            </div>
        </div>
    </div>

    <!-- Modal يخت الأناقة -->
    <div id="modal-anaqah" class="details-modal" onclick="if(event.target==this) this.style.display='none'">
        <div class="details-content">
            <span class="close-modal" onclick="document.getElementById('modal-anaqah').style.display='none'">&times;</span>
            <h2>يخت الأناقة - الصور الداخلية</h2>
            <div class="gallery">
                <div class="gallery-item"><img src="images/yacht2-1.jpg" alt="يخت الأناقة - داخلي 1"></div>
                <div class="gallery-item"><img src="images/yacht2-2.jpg" alt="يخت الأناقة - داخلي 2"></div>
                <div class="gallery-item"><img src="images/yacht2-3.jpg" alt="يخت الأناقة - داخلي 3"></div>
                <div class="gallery-item"><img src="images/yacht2-4.jpg" alt="يخت الأناقة - داخلي 4"></div>
                <div class="gallery-item"><img src="images/yacht2-5.jpg" alt="يخت الأناقة - داخلي 5"></div>
                <div class="gallery-item"><img src="images/yacht2-6.jpg" alt="يخت الأناقة - داخلي 6"></div>
            </div>
        </div>
    </div>

    <!-- Modal يخت الملكي -->
    <div id="modal-malaki" class="details-modal" onclick="if(event.target==this) this.style.display='none'">
        <div class="details-content">
            <span class="close-modal" onclick="document.getElementById('modal-malaki').style.display='none'">&times;</span>
            <h2>يخت الملكي - الصور الداخلية</h2>
            <div class="gallery">
                <div class="gallery-item"><img src="images/yacht3-1.jpg" alt="يخت الملكي - داخلي 1"></div>
                <div class="gallery-item"><img src="images/yacht3-2.jpg" alt="يخت الملكي - داخلي 2"></div>
                <div class="gallery-item"><img src="images/yacht3-3.jpg" alt="يخت الملكي - داخلي 3"></div>
                <div class="gallery-item"><img src="images/yacht3-4.jpg" alt="يخت الملكي - داخلي 4"></div>
                <div class="gallery-item"><img src="images/yacht3-5.jpg" alt="يخت الملكي - داخلي 5"></div>
                <div class="gallery-item"><img src="images/yacht3-6.jpg" alt="يخت الملكي - داخلي 6"></div>
            </div>
        </div>
    </div>

    <!-- Modal يخت الأحلام -->
    <div id="modal-ahlam" class="details-modal" onclick="if(event.target==this) this.style.display='none'">
        <div class="details-content">
            <span class="close-modal" onclick="document.getElementById('modal-ahlam').style.display='none'">&times;</span>
            <h2>يخت الأحلام - الصور الداخلية</h2>
            <div class="gallery">
                <div class="gallery-item"><img src="images/yacht4-1.jpg" alt="يخت الأحلام - داخلي 1"></div>
                <div class="gallery-item"><img src="images/yacht4-2.jpg" alt="يخت الأحلام - داخلي 2"></div>
                <div class="gallery-item"><img src="images/yacht4-3.jpg" alt="يخت الأحلام - داخلي 3"></div>
                <div class="gallery-item"><img src="images/yacht4-4.jpg" alt="يخت الأحلام - داخلي 4"></div>
                <div class="gallery-item"><img src="images/yacht4-5.jpg" alt="يخت الأحلام - داخلي 5"></div>
                <div class="gallery-item"><img src="images/yacht4-6.jpg" alt="يخت الأحلام - داخلي 6"></div>
            </div>
        </div>
    </div>

    <!-- Modal يخت العيد ميلاد -->
    <div id="modal-birthday" class="details-modal" onclick="if(event.target==this) this.style.display='none'">
        <div class="details-content">
            <span class="close-modal" onclick="document.getElementById('modal-birthday').style.display='none'">&times;</span>
            <h2>يخت العيد ميلاد - الصور الداخلية</h2>
            <div class="gallery">
                <div class="gallery-item"><img src="images/yachtb1.jpg" alt="يخت العيد ميلاد - داخلي 1"></div>
                <div class="gallery-item"><img src="images/yachtb2.jpg" alt="يخت العيد ميلاد - داخلي 2"></div>
                <div class="gallery-item"><img src="images/yachtb3.jpg" alt="يخت العيد ميلاد - داخلي 3"></div>
                <div class="gallery-item"><img src="images/yachtb4.jpg" alt="يخت العيد ميلاد - داخلي 4"></div>
                <div class="gallery-item"><img src="images/yachtb5.jpg" alt="يخت العيد ميلاد - داخلي 5"></div>
                <div class="gallery-item"><img src="images/yachtb6.jpg" alt="يخت العيد ميلاد - داخلي 6"></div>
            </div>
        </div>
    </div>

    <!--صفحة خدماتنا -->
    <section id="services" class="services-container">
        <h2 class="services-title">خدماتنا</h2>
        <p class="services-subtitle">خدمات تلبي توقعاتك وأكثر ...</p>

        <div class="service-item">
            <img src="images/service1.jpg" alt="خدمة التصوير داخل اليخت">
            <div class="service-text">
                <h3>خدمة التصوير داخل اليخت</h3>
                <p>نوفر تصوير احترافي داخل اليخت لرحلتك، لتوثيق أجمل اللحظات بشكل مميز.</p>
            </div>
        </div>

        <div class="service-item">
            <img src="images/service2.jpg" alt="تنظيم المناسبات والحفلات">
            <div class="service-text">
                <h3>تنظيم المناسبات والحفلات</h3>
                <p>نظمنا حفلات ومناسبات خاصة داخل اليخت بأرقى التفاصيل والخدمات المميزة.</p>
            </div>
        </div>

        <div class="service-item">
            <img src="images/service3.jpg" alt="طاقم الإنقاذ البحري">
            <div class="service-text">
                <h3>طاقم الإنقاذ البحري</h3>
                <p>فريق مختص بالسلامة والإنقاذ البحري لضمان تجربة آمنة طوال الرحلة.</p>
            </div>
        </div>

        <div class="service-item">
            <img src="images/service4.jpg" alt="الملاحة والطاقم البحري">
            <div class="service-text">
                <h3>الملاحة والطاقم البحري</h3>
                <p>طاقم محترف لإدارة اليخت والملاحة بدقة، لتجربة بحرية سلسة ومريحة.</p>
            </div>
        </div>

        <div class="service-item">
            <img src="images/service5.jpg" alt="الإرشاد البحري">
            <div class="service-text">
                <h3>الإرشاد البحري</h3>
                <p>خبراء للإرشاد البحري، لمساعدتك على اكتشاف أفضل الأماكن والاستمتاع بالرحلة بأمان.</p>
            </div>
        </div>
    </section>

    <!-- ========== صفحة من نحن ========== -->
    <section id="about">
        <div class="about-container">
            <div class="about-content">
                <p class="about-quote">"المغامرة لا حدود لها ولا تعريف"</p>
                <div class="about-description">
                    <h1>
                        <p>BlueWave Yacht company</p><br>
                    </h1>
                    <h2>
                        <p>موقعنا مصمم خصيصاً للأشخاص الذين يرغبون في الحصول على المتعة القصوى من كل رحلة أينما كانوا
                            بداية من المدن النابضة بالحياة في الخليج مثل البحرين والسعودية والامارات والكويت وقطر وعمان ولندن وتركيا
                            وصولا الى الشواطئ الخلابة في تايلاند واندونيسيا وفيتنام
                        </p><br>
                        <p>مغامراتنا مثل الروايات التي تقرأها وتغوص في احداثها تماما , وتأخذك الى عوالم ومغامرات لم تكن تعرفها من قبل
                            مغامراتنا مليئة بالحماس والاثارة والادرينالين والسعادة والمتعة , وتكوين صداقات جديدة وصنع ذكريات في اماكن لا تنسى ,
                            ذكريات دائماً ما تجلب لك الفرح
                        </p>
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== صفحة تواصل معنا ========== -->
    <section id="contact">
        <div class="contact-container">
            <div class="contact-form">
                <h2>تواصل معنا</h2>

                <div class="company-info">
                    <div class="info-item">
                        <strong>رقم التواصل:</strong>
                        <span>+966 50 123 4567</span>
                    </div>
                    <div class="info-item">
                        <strong>رقم الاستفسار:</strong>
                        <span>+966 50 765 4321</span>
                    </div>
                    <div class="info-item">
                        <strong>البريد الإلكتروني:</strong>
                        <span>info@yachttrips.com</span>
                    </div>
                    <div class="info-item">
                        <strong>البلد:</strong>
                        <span>المملكة العربية السعودية</span>
                    </div>
                </div>

                <h3 style="text-align: center; color: #f5576c; margin: 30px 0 20px;">أرسل استفسارك</h3>
                <div id="contactSuccess" class="success-message">تم إرسال الاستفسار بنجاح!</div>
                <form id="contactForm">
                    <div class="form-group">
                        <label>الرسالة</label>
                        <textarea required placeholder="اكتب استفسارك هنا..."></textarea>
                    </div>
                    <button type="submit" class="btn-contact">ارسال الاستفسار</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        // ========== تسجيل دخول ==========
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('login.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('loginSuccess').style.display = 'block';
                        document.getElementById('loginError').style.display = 'none';
                        setTimeout(() => {
                            closeLoginModal();
                            location.reload(); // تحديث الصفحة
                        }, 1500);
                    } else {
                        document.getElementById('loginError').textContent = data.message;
                        document.getElementById('loginError').style.display = 'block';
                        document.getElementById('loginSuccess').style.display = 'none';
                    }
                })
                .catch(error => {
                    document.getElementById('loginError').textContent = 'حدث خطأ في الاتصال';
                    document.getElementById('loginError').style.display = 'block';
                });
        });

        // ========== إنشاء حساب ==========
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('register.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('registerSuccess').style.display = 'block';
                        document.getElementById('registerError').style.display = 'none';
                        setTimeout(() => {
                            closeRegisterModal();
                            openLoginModal(); // فتح نافذة تسجيل الدخول
                        }, 1500);
                    } else {
                        document.getElementById('registerError').textContent = data.message;
                        document.getElementById('registerError').style.display = 'block';
                        document.getElementById('registerSuccess').style.display = 'none';
                    }
                })
                .catch(error => {
                    document.getElementById('registerError').textContent = 'حدث خطأ في الاتصال';
                    document.getElementById('registerError').style.display = 'block';
                });
        });

        // ========== الحجز ==========
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('booking.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('successMsg').textContent = data.message;
                        document.getElementById('successMsg').style.display = 'block';
                        document.getElementById('errorMsg').style.display = 'none';
                        this.reset(); // تفريغ الفورم
                        setTimeout(() => {
                            closeBookingModal();
                        }, 2000);
                    } else {
                        document.getElementById('errorMsg').textContent = data.message;
                        document.getElementById('errorMsg').style.display = 'block';
                        document.getElementById('successMsg').style.display = 'none';
                    }
                })
                .catch(error => {
                    document.getElementById('errorMsg').textContent = 'حدث خطأ في الاتصال';
                    document.getElementById('errorMsg').style.display = 'block';
                });
        });

        // ========== فتح/إغلاق النوافذ ==========
        function openLoginModal() {
            document.getElementById('loginModal').style.display = 'flex';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
        }

        function openRegisterModal() {
            closeLoginModal();
            document.getElementById('registerModal').style.display = 'flex';
        }

        function closeRegisterModal() {
            document.getElementById('registerModal').style.display = 'none';
        }

        function openBookingModel() {
            document.getElementById('bookingModal').style.display = 'flex';
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').style.display = 'none';
        }
    </script>




</body>

</html>