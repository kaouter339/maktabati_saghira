<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>مكتبتي الصغيرة🧸</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

:root {
  --primary: #ffddd2;
  --secondary:#F3E5D8;
  --accent: #D8A7B1;
  --purple-soft: #a683ba;
  --text-dark: #5E4B4B;
}

body{
  margin:0;
  font-family:'Cairo',sans-serif;

  background-image: url("https://i.pinimg.com/1200x/89/88/d6/8988d6139dad7fc624c108918233cec2.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}


.splash{
  background-image: url("https://i.pinimg.com/1200x/89/88/d6/8988d6139dad7fc624c108918233cec2.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  position: fixed;
  width: 100%;
  z-index: 1000;
}

.logo{
font-size:60px;
color:blac;
opacity:0;
animation:fadeIn 2s forwards;
}

@keyframes fadeIn{
from{opacity:0;transform:scale(.8)}
to{opacity:1;transform:scale(1)}
}

.page{
display:none;
min-height:100vh;
justify-content:center;
align-items:center;
padding:20px;
box-sizing: border-box;
}

.container{
  background: rgba(255,255,255,0.85);
  padding:30px;
  border-radius:20px;
  box-shadow:0 8px 20px rgba(0,0,0,0.2);
  text-align:center;
  width:90%;
  max-width:700px;
  position: relative;
  backdrop-filter: blur(8px);
}


.header-area {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.search-trigger {
  background: var(--primary);
  padding: 8px;
  border-radius: 10px;
  cursor: pointer;
  font-size: 20px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

h2{color:var(--text-dark); margin: 0;}

input{
width:100%;
padding:12px;
margin:8px 0;
border-radius:10px;
border:1px solid #dddddd;
box-sizing: border-box;
font-family: 'Cairo';
}

button{
width:100%;
padding:10px;
margin-top:10px;
border:none;
border-radius:10px;
background:var(--accent);
color:white;
font-weight:bold;
cursor:pointer;
}

.ok-button{
width:auto;
padding:8px 20px;
margin-top:20px;
border-radius:10px;
background:var(--accent);
color:white;
font-weight:bold;
cursor:pointer;
float:right;
}

.link{
margin-top:10px;
font-size:14px;
cursor:pointer;
text-decoration:underline;
color:var(--text-dark);
}

.error-msg{ color:red; font-size:14px; margin-top:5px; }
.success-msg{ color:green; font-size:14px; margin-top:5px; }
.category-grid, .stories-grid {
display:grid;
grid-template-columns:repeat(4,1fr);
gap:15px;
margin-top:20px;
}


.category-card{
background:white;
border-radius:15px;
padding:15px;
text-align:center;
cursor:pointer;
box-shadow:0 5px 10px rgba(0,0,0,0.1);
transition:0.3s;
}

.category-card img{ width:70px; height:60px; margin-bottom:10px; }
.category-card p{ margin:0; font-weight:bold; color:var(--text-dark); }
.category-card.selected{ border:3px solid #5E4B4B; transform:scale(1.05); }


.story-card{
position:relative;
border-radius:15px;
overflow:hidden;
cursor:pointer;
transition: 0.3s;
height: 220px;
}

.story-card img{
width:100%;
height:100%;
object-fit:cover;
}

.story-title{
position:absolute;
bottom:0;
right:0;
left:0;
background: rgba(0,0,0,0.4);
color:white;
padding: 10px;
font-weight:bold;
font-size:14px;
text-align: center;
}

.story-icons{
position:absolute;
top:10px;
left:10px;
display:flex;
flex-direction:column;
gap:10px;
}

.icon-btn{
width:35px;
height:35px;
background:white;
border-radius:50%;
display:flex;
justify-content:center;
align-items:center;
font-size:16px;
cursor:pointer;
box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}


.search-bar-container {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #f9f9f9;
  padding: 10px;
  border-radius: 15px;
  margin-bottom: 20px;
}

.back-btn {
  cursor: pointer;
  font-size: 20px;
  color: var(--text-dark);
}
.reader-controls{
  display:flex;
  justify-content:center;
  align-items:center;
  gap:25px;
  margin-top:20px;
}

.circle-btn{
  width:60px;
  height:60px;
  border-radius:50%;
  border:none;
  background:var(--accent);
  color:white;
  font-size:22px;
  cursor:pointer;
  display:flex;
  justify-content:center;
  align-items:center;
  box-shadow:0 5px 12px rgba(0,0,0,0.2);
  transition:0.2s;
}

.circle-btn:hover{
  transform:scale(1.1);
}

.circle-btn:disabled{
  opacity:0.4;
  cursor:not-allowed;
  transform:none;
}

.play-btn{
  font-size:26px;
}
.qcm-question{
  margin-top:20px;
  text-align:right;
  font-size:18px;
  font-weight:bold;
  color:var(--text-dark);
}

.qcm-options{
  margin-top:10px;
  display:flex;
  flex-direction:column;
  gap:10px;
}

.qcm-option{
  padding:12px;
  border-radius:12px;
  background:#f2f2f2;
  cursor:pointer;
  transition:0.2s;
  font-size:16px;
}

.qcm-option.correct{
  background:#b7f7c1;
}

.qcm-option.wrong{
  background:#ffb3b3;
}

.qcm-option.disabled{
  pointer-events:none;
  opacity:0.9;
}
.avatar-img{
width:70px;
height:70px;
border-radius:50%;
cursor:pointer;
border:3px solid transparent;
transition:0.2s;
}

.avatar-img.selected{
border:3px solid #D8A7B1;
}
@media(max-width:900px){ .stories-grid { grid-template-columns: repeat(2, 1fr); } }
@media(max-width:600px){ .stories-grid { grid-template-columns: 1fr; } }
</style>
</head>

<body>

<div class="splash" id="splash">
<h1 class="logo">مكتبتي الصغيرة🧸</h1>
</div>

<div class="page" id="loginPage">
<div class="container">
<h2>تسجيل دخول الأب 🔑</h2>

<input type="text" id="loginUsername" placeholder="اسم المستخدم">
<input type="email" id="loginEmail" placeholder="البريد الإلكتروني">
<input type="password" id="loginPassword" placeholder="كلمة المرور">
<button type="button" onclick="login()">دخول</button>

<div id="loginError" class="error-msg"></div>
<div class="link" onclick="showRegister()">إنشاء حساب جديد</div>
<div class="link" onclick="showForgotPassword()">نسيت كلمة المرور؟</div>
</div>
</div>
<div class="page" id="forgotPasswordPage" style="display:none;">
  <div class="container">
    <h2>🔒 استرجاع كلمة المرور</h2>

    <input type="email" id="forgotEmail" placeholder="أدخل بريدك الإلكتروني">

    <button onclick="sendResetCode()">إرسال الكود</button>

    <div id="forgotMsg" class="success-msg"></div>
    <div id="forgotError" class="error-msg"></div>

    <div class="link" onclick="showLoginFromForgot()">🔙 العودة لتسجيل الدخول</div>
  </div>
</div>
<div class="page" id="resetPasswordPage" style="display:none;">
  <div class="container">
    <h2>🔑 تغيير كلمة المرور</h2>

    <input type="email" id="resetEmail" placeholder="البريد الإلكتروني">
    <input type="text" id="resetCode" placeholder="أدخل الكود">
    <input type="password" id="newPassword" placeholder="كلمة المرور الجديدة">
    <input type="password" id="confirmPassword" placeholder="تأكيد كلمة المرور">

    <button onclick="confirmResetPassword()">تأكيد تغيير كلمة المرور</button>

    <div id="resetMsg" class="success-msg"></div>
    <div id="resetError" class="error-msg"></div>

    <div class="link" onclick="showLogin()">🔙 العودة لتسجيل الدخول</div>
  </div>
</div>
<div class="page" id="whoIsReadingPage">
    <div class="container" style="max-width: 800px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 1;">
                <h2 style="margin-bottom: 20px;">من سيقرأ اليوم؟ 😊</h2>
                <div id="childrenList" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;"></div>
            </div>

            <div style="background: var(--primary); padding: 15px; border-radius: 15px; width: 180px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <h4 style="margin-top: 0; color: var(--text-dark);">إعدادات الأب ⚙️</h4>
                <button onclick="goToAddChild()" style="font-size: 12px; background: var(--purple-soft); color: white; margin-top: 15px;">➕ إضافة طفل</button>
                <button onclick="enableEditMode()" style="font-size: 12px; background: var(--purple-soft); color: white; margin-top: 10px;">✏️ تعديل</button>
                <button onclick="enableDeleteMode()" style="font-size: 12px; background: var(--purple-soft); color: white; margin-top: 10px;">🗑 حذف طفل</button>
                <button onclick="enableHistoryMode()" style="font-size: 12px; background: var(--purple-soft); color: white; margin-top: 10px;">📜 سجل المشاهدة</button>
                <button onclick="logout()" style="font-size: 12px; background: var(--purple-soft); color: white; margin-top: 15px;">🚪 تسجيل خروج</button>
            </div>
        </div>
    </div>
</div>

<div id="editChildModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:3000; justify-content:center; align-items:center;">
  <div class="container" style="max-width:700px;">

    <h2>✏️ تعديل معلومات الطفل</h2>
    <input type="text" id="editChildName" placeholder="اسم الطفل الجديد (اختياري)">

    <h3 style="margin-top:15px; color:#5E4B4B;">اختر أفاتار جديد:</h3>
    <div style="display:flex; justify-content:center; gap:15px; flex-wrap:wrap; margin-top:10px;" id="editAvatarBox">
      <img src="https://i.pinimg.com/736x/13/ad/4f/13ad4ff31f1c6dbfc7c9ea728a9f505d.jpg" class="avatar-img" onclick="selectEditAvatar(this)">
      <img src="https://i.pinimg.com/736x/60/cd/8f/60cd8fb95541c1bac1184a956ffbca8b.jpg" class="avatar-img" onclick="selectEditAvatar(this)">
      <img src="https://i.pinimg.com/736x/c0/92/f4/c092f43b28eb9eaf1255b2d29ce656a0.jpg" class="avatar-img" onclick="selectEditAvatar(this)">
      <img src="https://i.pinimg.com/1200x/c3/21/4f/c3214f468db4bcd17660bf05fe8d018a.jpg" class="avatar-img" onclick="selectEditAvatar(this)">
      <img src="https://i.pinimg.com/736x/13/a2/6f/13a26f99be192266a670a38b2ad6f846.jpg" class="avatar-img" onclick="selectEditAvatar(this)">
      <img src="https://i.pinimg.com/1200x/a3/56/4b/a3564b3983ded2542f6aae4cff832470.jpg" class="avatar-img" onclick="selectEditAvatar(this)">
    </div>

    <input type="hidden" id="editAvatar" value="">

    <h3 style="margin-top:15px; color:#5E4B4B;">اختر الكاتيغوري:</h3>
    <div class="category-grid" id="editCategoryGrid">
      <div class="category-card" onclick="toggleCategory(this)">الأشكال والألوان</div>
      <div class="category-card" onclick="toggleCategory(this)">قصص مضحكة</div>
      <div class="category-card" onclick="toggleCategory(this)">الحيوانات الأليفة</div>
      <div class="category-card" onclick="toggleCategory(this)">سيارات</div>
      <div class="category-card" onclick="toggleCategory(this)">ديناصورات</div>
      <div class="category-card" onclick="toggleCategory(this)">خيال</div>
      <div class="category-card" onclick="toggleCategory(this)">فضاء</div>
      <div class="category-card" onclick="toggleCategory(this)">عالمي</div>
      <div class="category-card" onclick="toggleCategory(this)">مغامرات</div>
      <div class="category-card" onclick="toggleCategory(this)">الفرنسية</div>
      <div class="category-card" onclick="toggleCategory(this)">قصص إسلامية</div>
      <div class="category-card" onclick="toggleCategory(this)">تجارب</div>
    </div>

    <button onclick="saveChildEdits()">💾 حفظ التعديلات</button>
    <button onclick="closeEditChildModal()" style="background:#ccc; color:black;">إلغاء</button>

    <div id="editError" class="error-msg"></div>
  </div>
</div>
<div class="page" id="registerPage">
<div class="container">
<h2>إنشاء حساب ✏️</h2>

<input type="text" id="regChildName" placeholder="اسم الطفل">
<input type="number" id="regAge" placeholder="العمر" min="1">

<input type="text" id="regUsername" placeholder="اسم المستخدم">
<input type="email" id="regEmail" placeholder="البريد الإلكتروني">

<input type="password" id="regPassword" placeholder="كلمة المرور">

<h3 style="margin-top:15px; color:#5E4B4B;">اختر صورة الطفل 👦👧</h3>

<div style="display:flex; justify-content:center; gap:15px; flex-wrap:wrap; margin-top:10px;" id="avatarBox">
  <img src="https://i.pinimg.com/736x/13/ad/4f/13ad4ff31f1c6dbfc7c9ea728a9f505d.jpg" class="avatar-img" onclick="selectAvatar(this)">
  <img src="https://i.pinimg.com/736x/60/cd/8f/60cd8fb95541c1bac1184a956ffbca8b.jpg" class="avatar-img" onclick="selectAvatar(this)">
  <img src="https://i.pinimg.com/736x/c0/92/f4/c092f43b28eb9eaf1255b2d29ce656a0.jpg" class="avatar-img" onclick="selectAvatar(this)">
  <img src="https://i.pinimg.com/1200x/c3/21/4f/c3214f468db4bcd17660bf05fe8d018a.jpg" class="avatar-img" onclick="selectAvatar(this)">
  <img src="https://i.pinimg.com/736x/13/a2/6f/13a26f99be192266a670a38b2ad6f846.jpg" class="avatar-img" onclick="selectAvatar(this)">
  <img src="https://i.pinimg.com/1200x/a3/56/4b/a3564b3983ded2542f6aae4cff832470.jpg" class="avatar-img" onclick="selectAvatar(this)">
</div>

<input type="hidden" id="regAvatar" value="">

<button type="button" onclick="register()">تسجيل</button>

<div id="regError" class="error-msg"></div>
<div class="link" onclick="showLogin()">العودة لتسجيل الدخول</div>

</div>
</div>

<div class="page" id="categoryPage">
<div class="container">
<h2>اختر المواضيع 📚</h2>
<div class="category-grid">
<div class="category-card" onclick="toggleCategory(this)"><img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png"><p>الأشكال والألوان</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://cdn-icons-png.flaticon.com/512/742/742751.png"><p>قصص مضحكة</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"><p>الحيوانات الأليفة</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://cdn-icons-png.flaticon.com/512/744/744465.png"><p>سيارات</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://clipart-library.com/image_gallery2/Dinosaur-PNG.png"><p>ديناصورات</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://cdn-icons-png.flaticon.com/512/3468/3468383.png"><p>خيال</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://cdn-icons-png.flaticon.com/512/3212/3212608.png"><p>فضاء</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://cdn-icons-png.flaticon.com/512/854/854878.png"><p>عالمي</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://img.icons8.com/color/96/forest.png"><p>مغامرات</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://img.icons8.com/color/96/abc.png"><p>الفرنسية</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://img.icons8.com/color/96/mosque.png"><p>قصص إسلامية</p></div>
<div class="category-card" onclick="toggleCategory(this)"><img src="https://img.icons8.com/color/96/laboratory.png"><p>تجارب</p></div>
</div>
<button class="ok-button" onclick="goToStories()">OK</button>
</div>
</div>

<div class="page" id="storiesPage">
<div class="container">
  <div class="header-area">
    <h2>القصص 📖</h2>
    <div class="search-trigger" onclick="showSearchPage()">🔍</div>
  </div>
  <div class="stories-grid" id="mainStoriesGrid"></div>
</div>
</div>
<div class="page" id="historyPage" style="display:none;">
  <div class="container">
    <h2 id="historyTitle">📜 القصص المقروءة</h2>

    <div class="stories-grid" id="historyGrid"></div>

    <div class="link" onclick="closeHistory()">🔙 رجوع</div>
  </div>
</div>

<div class="page" id="searchPage">
<div class="container">
  <div class="search-bar-container">
    <span class="back-btn" onclick="goBackToStories()">🔙</span>
    <input type="text" id="searchInput" placeholder="البحث..." oninput="searchStories()">
  </div>
  <div class="stories-grid" id="searchResults"></div>
</div>
</div>

<div class="page" id="readerPage">
  <div class="container">
    <h2 id="storyTitle"></h2>
    <img id="pageImage" style="width:100%; border-radius:15px; max-height:250px; object-fit:cover;">
    <div style="margin-top:15px; background:#f9f9f9; padding:15px; border-radius:15px;">
      <p id="pageText" style="font-size:18px; line-height:1.8;"></p>
    </div>
    <div class="reader-controls">
      <button id="prevBtn" class="circle-btn" onclick="prevPage()">❮</button>
      <button id="playBtn" class="circle-btn play-btn" onclick="toggleAudio()">▶</button>
      <button id="nextBtn" class="circle-btn" onclick="nextPage()">❯</button>
    </div>
    <div class="link" onclick="closeReader()">🔙 العودة للقصص</div>
  </div>
</div>

<div class="page" id="qcmPage">
  <div class="container">
    <h2>📝 أسئلة القصة</h2>
    <div id="qcmContainer"></div>
    <h3 id="finalScore" style="margin-top:20px;"></h3>
    <button onclick="finishQcm()">إنهاء</button>
  </div>
</div>

<script>

let favoriteBooks = [];
let currentBookId = 0;
let currentPages = [];
let currentIndex = 0;

let qcmData = [];
let qcmIndex = 0;
let score = 0;
let answered = false;

let selectedEditAvatar = "";
let editingChildId = null;
let editMode = false;
let historyMode = false;
let deleteMode = false;


setTimeout(() => {
  document.getElementById("splash").style.display = "none";
  document.getElementById("loginPage").style.display = "flex";
}, 2000);

function enableEditMode(){
  editMode = true;
  alert("اضغط على أفاتار الطفل الذي تريد تعديله ✏️");
}

function showRegister() {
  document.getElementById("loginPage").style.display = "none";
  document.getElementById("registerPage").style.display = "flex";
}

function showLogin() {
  document.getElementById("registerPage").style.display = "none";
  document.getElementById("loginPage").style.display = "flex";
}

function selectAvatar(img) {
  document.querySelectorAll("#avatarBox .avatar-img").forEach(i => i.classList.remove("selected"));
  img.classList.add("selected");
  document.getElementById("regAvatar").value = img.getAttribute("src");
}

async function register() {
  const name = document.getElementById("regChildName").value.trim();
  const age = document.getElementById("regAge").value.trim();
  const username = document.getElementById("regUsername").value.trim();
  const email = document.getElementById("regEmail").value.trim();
  const pass = document.getElementById("regPassword").value.trim();
  const avatar = document.getElementById("regAvatar").value.trim();
  const error = document.getElementById("regError");

  error.textContent = "";

  if (name === "" || age === "" || username === "" || email === "" || pass === "" || avatar === "") {
    error.textContent = "يجب ملء جميع الحقول واختيار صورة";
    return;
  }

  const formData = new FormData();
  formData.append("child_name", name);
  formData.append("age", age);
  formData.append("username", username);
  formData.append("email", email);
  formData.append("password", pass);
  formData.append("avatar", avatar);

  const res = await fetch("register.php", { method: "POST", body: formData });
  const data = await res.json();

  if (data.status === "success") {
    document.getElementById("registerPage").style.display = "none";
    document.getElementById("categoryPage").style.display = "flex";
  } else {
    error.textContent = data.message;
  }
}

async function login() {
  const username = document.getElementById("loginUsername").value.trim();
  const email = document.getElementById("loginEmail").value.trim();
  const password = document.getElementById("loginPassword").value.trim();
  const error = document.getElementById("loginError");

  error.textContent = "";

  if (username === "" || email === "" || password === "") {
    error.textContent = "يرجى ملء جميع الحقول";
    return;
  }

  const formData = new FormData();
  formData.append("username", username);
  formData.append("email", email);
  formData.append("password", password);

  const res = await fetch("login_parent.php", {
    method: "POST",
    body: formData,
    credentials: "include"
  });

  const data = await res.json();

  if (data.status === "success") {
    document.getElementById("loginPage").style.display = "none";
    document.getElementById("whoIsReadingPage").style.display = "flex";

    const list = document.getElementById("childrenList");
    list.innerHTML = "";

    data.children.forEach(child => {
      list.innerHTML += `
        <div class="child-card" style="text-align:center; cursor:pointer;">
          <img src="${child.avatar}" class="avatar-img" style="width:100px; height:100px;"
            onclick="handleChildClick(${child.id}, '${child.child_name}', '${child.avatar}')">
          <p style="font-weight:bold;">${child.child_name}</p>
        </div>
      `;
    });

  } else {
    error.textContent = data.message;
  }
}

function handleChildClick(childId, childName, childAvatar){

  if(deleteMode === true){
    deleteChild(childId, childName);
    deleteMode = false;
    return;
  }

  if(editMode === true){
    openEditChildModal(childId, childName, childAvatar);
    editMode = false;
    return;
  }

  if(historyMode === true){
    openHistory(childId, childName);
    historyMode = false;
    return;
  }

  enterChild(childId);
}

async function enterChild(childId){

  const formData = new FormData();
  formData.append("child_id", childId);

  const res = await fetch("set_child.php", { method:"POST", body: formData });
  const data = await res.json();

  if(data.status !== "success"){
    alert("خطأ: " + data.message);
    return;
  }

  document.getElementById("whoIsReadingPage").style.display = "none";
  document.getElementById("storiesPage").style.display = "flex";

  await loadFavorites();
  await loadStories();
}

function logout() {
  window.location.reload();
}

function toggleCategory(card) {
  card.classList.toggle("selected");
}

async function goToStories() {
  const selectedCategories = [];

  document.querySelectorAll("#categoryPage .category-card.selected p").forEach(p => {
    selectedCategories.push(p.innerText.trim());
  });

  if (selectedCategories.length === 0) {
    alert("اختر كاتيغوري واحدة على الأقل");
    return;
  }

  const formData = new FormData();
  formData.append("categories", JSON.stringify(selectedCategories));

  const res = await fetch("save_categories.php", { method: "POST", body: formData });
  const data = await res.json();

  if (data.status === "success") {
    document.getElementById("categoryPage").style.display = "none";
    document.getElementById("storiesPage").style.display = "flex";

    await loadFavorites();
    await loadStories();
  } else {
    alert(data.message);
  }
}

async function loadStories() {
  const res = await fetch("get_user_books.php");
  const text = await res.text();

  console.log("GET USER BOOKS RESPONSE:", text);

  const data = JSON.parse(text);

  if (data.status === "error") {
    alert(data.message);
    return;
  }

  displayStories(data, "mainStoriesGrid");
}

function displayStories(data, gridId) {
  const grid = document.getElementById(gridId);
  grid.innerHTML = "";

  if (!Array.isArray(data) || data.length === 0) {
    grid.innerHTML = "<p style='color:red;'>لا توجد نتائج</p>";
    return;
  }

  data.forEach(story => {
    const bookId = story.id_book || story.id;
    const title = story.title;
    const img = story.img || story.image;

    const heart = favoriteBooks.includes(parseInt(bookId)) ? "❤️" : "🤍";

    grid.innerHTML += `
      <div class="story-card" onclick="openStory(${bookId}, '${title.replace(/'/g, "\\'")}')">
        <img src="${img}">
        <div class="story-icons">
          <div class="icon-btn" onclick="event.stopPropagation(); toggleFavorite(${bookId}, this)">${heart}</div>
        </div>
        <div class="story-title">${title}</div>
      </div>
    `;
  });
}

async function loadFavorites() {
  const res = await fetch("get_favorites.php");
  favoriteBooks = await res.json();
}

async function toggleFavorite(bookId, btn) {

  const formData = new FormData();
  formData.append("book_id", bookId);

  const res = await fetch("favorite.php", { method: "POST", body: formData });
  const data = await res.json();

  if (data.status === "added") btn.innerHTML = "❤️";
  else if (data.status === "removed") btn.innerHTML = "🤍";

  await loadFavorites();
}

async function openStory(bookId, title) {

  const fd = new FormData();
  fd.append("book_id", bookId);
  await fetch("save_history.php", {method:"POST", body: fd});
  currentBookId = bookId;
  document.getElementById("storiesPage").style.display = "none";
  document.getElementById("searchPage").style.display = "none";
  document.getElementById("historyPage").style.display = "none";
  document.getElementById("readerPage").style.display = "flex";
  document.getElementById("storyTitle").textContent = title;
  const res = await fetch("get_story_pages.php?book_id=" + bookId);
  currentPages = await res.json();
  currentIndex = 0;
  if (currentPages.length > 0) showPage();
}

function showPage() {
  document.getElementById("pageImage").src = currentPages[currentIndex].image;
  document.getElementById("pageText").textContent = currentPages[currentIndex].text;

  document.getElementById("prevBtn").style.display = (currentIndex === 0) ? "none" : "flex";
  document.getElementById("nextBtn").innerHTML = (currentIndex === currentPages.length - 1) ? "📝" : "❯";
}

function nextPage() {

  speech.cancel();
  isPlaying = false;
  document.getElementById("playBtn").innerHTML = "▶";

  if (currentIndex < currentPages.length - 1) {
    currentIndex++;
    showPage();
  } else {
    showQcm(currentBookId);
  }
}

function prevPage() {

  speech.cancel();
  isPlaying = false;
  document.getElementById("playBtn").innerHTML = "▶";

  if (currentIndex > 0) {
    currentIndex--;
    showPage();
  }
}

function closeReader() {

  
  speech.cancel();
  isPlaying = false;
  document.getElementById("playBtn").innerHTML = "▶";

  document.getElementById("readerPage").style.display = "none";
  document.getElementById("storiesPage").style.display = "flex";
}
let speech = window.speechSynthesis;
let utterance = null;
let isPlaying = false;

function getBestVoice(lang){
  let voices = speech.getVoices();
  let v = voices.find(voice => voice.lang.toLowerCase().includes(lang.toLowerCase()));
  return v || voices[0];
}

function detectLanguage(text){
  if(/[ء-ي]/.test(text)) return "ar";
  return "fr";
}

function toggleAudio(){

  const text = document.getElementById("pageText").textContent;

  if(text.trim() === ""){
    alert("لا يوجد نص لقراءته");
    return;
  }

  if(isPlaying){
    speech.cancel();
    isPlaying = false;
    document.getElementById("playBtn").innerHTML = "▶";
    return;
  }

  let lang = detectLanguage(text);

  utterance = new SpeechSynthesisUtterance(text);

  if(lang === "ar"){
    utterance.lang = "ar-SA";
    utterance.voice = getBestVoice("ar");
  }else{
    utterance.lang = "fr-FR";
    utterance.voice = getBestVoice("fr");
  }

  utterance.rate = 1;
  utterance.pitch = 1;

  utterance.onend = function(){
    isPlaying = false;
    document.getElementById("playBtn").innerHTML = "▶";
  };

  speech.speak(utterance);

  isPlaying = true;
  document.getElementById("playBtn").innerHTML = "⏸";
}

async function showQcm(bookId) {
  score = 0;
  qcmIndex = 0;

  document.getElementById("readerPage").style.display = "none";
  document.getElementById("qcmPage").style.display = "flex";

  const res = await fetch("get_qcm.php?book_id=" + bookId);
  qcmData = await res.json();

  if (qcmData.length === 0) {
    document.getElementById("qcmContainer").innerHTML = "لا توجد أسئلة.";
    return;
  }

  showOneQuestion();
}

function showOneQuestion() {
  answered = false;
  const q = qcmData[qcmIndex];

  document.getElementById("qcmContainer").innerHTML = `
    <div class="qcm-question">${qcmIndex + 1}) ${q.question}</div>
    <div class="qcm-options" id="optionsBox">
      <div class="qcm-option" onclick="checkAnswer('${q.option1}', '${q.answer}', this)">${q.option1}</div>
      <div class="qcm-option" onclick="checkAnswer('${q.option2}', '${q.answer}', this)">${q.option2}</div>
      <div class="qcm-option" onclick="checkAnswer('${q.option3}', '${q.answer}', this)">${q.option3}</div>
    </div>
  `;
}

function checkAnswer(sel, cor, el) {
  if (answered) return;
  answered = true;

  if (sel.trim() === cor.trim()) {
    el.classList.add("correct");
    score++;
  } else {
    el.classList.add("wrong");
  }

  setTimeout(() => {
  qcmIndex++;

  if (qcmIndex < qcmData.length) {
    showOneQuestion();
  } else {

     document.getElementById("qcmContainer").innerHTML = "انتهت الأسئلة ✅";
     document.getElementById("finalScore").innerHTML =
      "🎉 نتيجتك: " + score + " / " + qcmData.length ;
  }

}, 1000);
}

function finishQcm() {
  document.getElementById("qcmPage").style.display = "none";
  document.getElementById("storiesPage").style.display = "flex";

  document.getElementById("finalScore").innerHTML = "";
  document.getElementById("qcmContainer").innerHTML = "";
}

async function searchStories() {
  const input = document.getElementById("searchInput").value.trim();
  const resultsBox = document.getElementById("searchResults");

  if (input === "") {
    resultsBox.innerHTML = "";
    return;
  }

  const res = await fetch("search.php?term=" + encodeURIComponent(input));
  const data = await res.json();
  displayStories(data, "searchResults");
}
function showSearchPage() {
  document.getElementById("storiesPage").style.display = "none";
  document.getElementById("searchPage").style.display = "flex";

  document.getElementById("searchInput").value = "";
  document.getElementById("searchResults").innerHTML = "";
}
function goBackToStories() {
  document.getElementById("searchPage").style.display = "none";
  document.getElementById("storiesPage").style.display = "flex";
}

function openEditChildModal(childId, childName, childAvatar){
  editingChildId = childId;
  document.getElementById("editChildName").value = childName;
  document.getElementById("editAvatar").value = childAvatar;
  document.querySelectorAll("#editAvatarBox .avatar-img").forEach(i => i.classList.remove("selected"));
  document.querySelectorAll("#editCategoryGrid .category-card").forEach(i => i.classList.remove("selected"));
  document.getElementById("editChildModal").style.display="flex";
}

function closeEditChildModal(){
  document.getElementById("editChildModal").style.display="none";
}

function selectEditAvatar(img) {
  document.querySelectorAll("#editAvatarBox .avatar-img").forEach(i => {
    i.classList.remove("selected");
  });

  img.classList.add("selected");

  document.getElementById("editAvatar").value = img.src;
}

async function saveChildEdits(){
  const newName = document.getElementById("editChildName").value.trim();
  const newAvatar = document.getElementById("editAvatar").value.trim();
  const error = document.getElementById("editError");

  error.textContent = "";

  if(editingChildId === null){
    error.textContent = "لم يتم تحديد الطفل!";
    return;
  }

  let selectedCategories = [];
  document.querySelectorAll("#editCategoryGrid .category-card.selected").forEach(card=>{
    selectedCategories.push(card.textContent.trim());
  });

  const formData = new FormData();
  formData.append("child_id", editingChildId);
  formData.append("child_name", newName);
  formData.append("avatar", newAvatar);
  formData.append("categories", JSON.stringify(selectedCategories));

  const res = await fetch("update_children.php", { method:"POST", body: formData });
  const data = await res.json();

  if(data.status === "success"){
    alert("تم الحفظ ✅");
    closeEditChildModal();
    location.reload();
  }else{
    error.textContent = data.message;
  }
}
async function showHistoryChildrenPage(){

  document.getElementById("whoIsReadingPage").style.display="none";
  document.getElementById("historyChildrenPage").style.display="flex";

  const res = await fetch("get_children.php");
  const data = await res.json();

  if(data.status !== "success"){
    alert(data.message);
    return;
  }

  const list = document.getElementById("historyChildrenList");
  list.innerHTML = "";

  data.children.forEach(child=>{
    list.innerHTML += `
      <div class="child-card" style="text-align:center; cursor:pointer;">
        <img src="${child.avatar}" class="avatar-img" style="width:100px; height:100px;"
          onclick="openChildHistory(${child.id}, '${child.child_name}')">
        <p style="font-weight:bold;">${child.child_name}</p>
      </div>
    `;
  });
}

function enableHistoryMode(){
  historyMode = true;
  alert("اضغط على أفاتار الطفل لرؤية الهيستوريك 📜");
}

async function openHistory(childId, childName){
  document.getElementById("whoIsReadingPage").style.display="none";
  document.getElementById("historyPage").style.display="flex";
  document.getElementById("historyTitle").textContent = "📜 Historique: " + childName;

  const res = await fetch("get_history.php?child_id=" + childId, {
    credentials: "include"
  });

  const data = await res.json();

  const grid = document.getElementById("historyGrid");
  grid.innerHTML = "";

  if(data.status !== "success"){
    grid.innerHTML = "<p style='color:red;'>" + data.message + "</p>";
    return;
  }

  if(data.stories.length === 0){
    grid.innerHTML = "<p style='color:red;'>لا توجد قصص مقروءة</p>";
    return;
  }

  data.stories.forEach(story=>{
    grid.innerHTML += `
      <div class="story-card" onclick="openStory(${story.id_book}, '${story.title}')">
        <img src="${story.image}">
        <div class="story-title">${story.title}</div>
      </div>
    `;
  });
}

function closeHistory(){
  document.getElementById("historyPage").style.display="none";
  document.getElementById("whoIsReadingPage").style.display="flex";
}
 function goToAddChild(){
  document.getElementById("whoIsReadingPage").style.display = "none";
  document.getElementById("registerPage").style.display = "flex";
  document.getElementById("regChildName").value = "";
  document.getElementById("regAge").value = "";
  document.getElementById("regPassword").value = "";
  document.getElementById("regAvatar").value = "";
  document.getElementById("regError").textContent = "";
  document.getElementById("regUsername").value = document.getElementById("loginUsername").value;
  document.getElementById("regEmail").value = document.getElementById("loginEmail").value;
  document.querySelectorAll("#avatarBox .avatar-img").forEach(i => i.classList.remove("selected"));
}
function showForgotPassword(){
  document.getElementById("loginPage").style.display = "none";
  document.getElementById("forgotPasswordPage").style.display = "flex";
}

function showLoginFromForgot(){
  document.getElementById("forgotPasswordPage").style.display = "none";
  document.getElementById("loginPage").style.display = "flex";
}
async function sendResetCode(){

  const email = document.getElementById("forgotEmail").value.trim();
  const msg = document.getElementById("forgotMsg");
  const err = document.getElementById("forgotError");

  msg.textContent = "";
  err.textContent = "";

  if(email === ""){
    err.textContent = "يرجى إدخال البريد الإلكتروني";
    return;
  }

  const formData = new FormData();
  formData.append("email", email);

  const res = await fetch("send_reset_code.php", {
    method: "POST",
    body: formData
  });

  const data = await res.json();

  if(data.status === "success"){

    msg.textContent = "✅ تم إرسال الكود إلى بريدك الإلكتروني";

    document.getElementById("forgotPasswordPage").style.display = "none";
    document.getElementById("resetPasswordPage").style.display = "flex";

    document.getElementById("resetEmail").value = email;

  }else{
    err.textContent = data.message;
  }
}

async function confirmResetPassword(){
  const email = document.getElementById("resetEmail").value.trim();
  const code = document.getElementById("resetCode").value.trim();
  const newPass = document.getElementById("newPassword").value.trim();
  const confirmPass = document.getElementById("confirmPassword").value.trim();

  const msg = document.getElementById("resetMsg");
  const err = document.getElementById("resetError");

  msg.textContent = "";
  err.textContent = "";

  if(newPass === "" || confirmPass === "" || code === ""){
    err.textContent = "يرجى ملء جميع الحقول";
    return;
  }

  if(newPass !== confirmPass){
    err.textContent = "كلمتا المرور غير متطابقتين";
    return;
  }

  const formData = new FormData();
  formData.append("email", email);
  formData.append("code", code);
  formData.append("new_password", newPass);

  const res = await fetch("reset_password.php", {
    method: "POST",
    body: formData
  });

  const data = await res.json();

  if(data.status === "success"){
    msg.textContent = "✅ تم تغيير كلمة المرور بنجاح";

    setTimeout(()=>{
      document.getElementById("resetPasswordPage").style.display = "none";
      document.getElementById("loginPage").style.display = "flex";
    }, 2000);

  }else{
    err.textContent = data.message;
  }
}

function enableDeleteMode(){
  deleteMode = true;
  alert("اضغطي على أفاتار الطفل الذي تريدين حذفه 🗑️");
}
async function deleteChild(childId, childName){

if(!confirm("هل تريدين حذف الطفل: " + childName + " ؟ ❌")){
return;
}

const formData = new FormData();
formData.append("child_id", childId);

const res = await fetch("delete_child.php", {
method: "POST",
body: formData
});

const data = await res.json();

if(data.status === "success"){
alert("تم حذف الطفل بنجاح ✅");
location.reload();
}else{
alert("خطأ: " + data.message);
}
}
async function refreshChildrenList(){
const res = await fetch("get_children.php");
const data = await res.json();

const list = document.getElementById("childrenList");
list.innerHTML = "";

data.children.forEach(child => {
  const safeName = child.child_name.replace(/'/g, "\\'");
    list.innerHTML += `
      <div class="child-card" style="text-align:center; cursor:pointer;">
        <img src="${child.avatar}" class="avatar-img"
          style="width:100px; height:100px;"
          onclick="handleChildClick(${child.id}, '${safeName}', '${child.avatar}')">

        <p style="font-weight:bold;">${child.child_name}</p>
      </div>
    `;
  });
}

</script>
</body>
</html>