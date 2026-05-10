<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EduLearn — Master Programming Through Video</title>
  <!-- Remix Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
<style>
/* ═══════════════════════════════════════════════════════════════
   COURSES STYLES — matches blade template class names exactly
   ═══════════════════════════════════════════════════════════════ */
/* ── Grid ── */
.courses-grid {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 28px;
}
@media (min-width: 640px) {
  .courses-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (min-width: 1024px) {
  .courses-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
/* ═══════════════════════════════════════════════════════════════
   COURSE CARD
   ═══════════════════════════════════════════════════════════════ */
.course-card {
  position: relative;
  display: flex;
  flex-direction: column;
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.08);
  background: #0f172a;
  cursor: pointer;
  transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
  min-height: 480px;
}
.course-card:hover {
  transform: translateY(-8px);
  border-color: rgba(124, 58, 237, 0.45);
  box-shadow: 0 12px 40px rgba(124, 58, 237, 0.15);
}
/* ── Glow hover (glow-hover class from blade) ── */
.glow-hover::before {
  content: '';
  position: absolute;
  inset: -1px;
  border-radius: inherit;
  padding: 1px;
  background: linear-gradient(
    90deg,
    transparent 0%,
    rgba(124, 58, 237, 0.35) 25%,
    rgba(167, 139, 250, 0.55) 50%,
    rgba(124, 58, 237, 0.35) 75%,
    transparent 100%
  );
  background-size: 200% 100%;
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
  opacity: 0;
  transition: opacity 0.35s ease;
  pointer-events: none;
}
.glow-hover:hover::before {
  opacity: 1;
  animation: shimmer 2.2s linear infinite;
}
/* ══════ THUMBNAIL ══════ */
.card-thumb {
  position: relative;
  width: 100%;
  height: 200px;
  overflow: hidden;
  background: #070e1c;
  flex-shrink: 0;
}
.card-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: top;
  transition: transform 0.6s ease;
}
.course-card:hover .card-thumb img {
  transform: scale(1.06);
}
/* overlay (matches blade class name) */
.overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(15, 23, 42, 0.85) 0%, transparent 50%);
  pointer-events: none;
}
/* category badge */
.cat-badge {
  position: absolute;
  top: 12px;
  left: 12px;
  z-index: 2;
  display: flex;
  align-items: center;
  gap: 6px;
  background: rgba(10, 22, 40, 0.85);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: 999px;
  padding: 5px 12px;
}
.cat-badge i {
  color: #a78bfa;
  font-size: 13px;
}
.cat-badge span {
  color: #e2e8f0;
  font-size: 12px;
  font-weight: 500;
  white-space: nowrap;
}
/* play button */
.play-btn {
  position: absolute;
  inset: 0;
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}
.course-card:hover .play-btn {
  opacity: 1;
}
/* circle (matches blade class name) */
.circle {
  width: 52px;
  height: 52px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: #7c3aed;
  box-shadow: 0 8px 28px rgba(124, 58, 237, 0.55);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.circle:hover {
  transform: scale(1.12);
  box-shadow: 0 10px 34px rgba(124, 58, 237, 0.7);
}
.circle i {
  color: #fff;
  font-size: 20px;
  margin-left: 3px;
}
/* ══════ BODY ══════ */
.card-body {
  display: flex;
  flex-direction: column;
  flex: 1 1 auto;
  padding: 18px 20px 20px;
  gap: 10px;
  min-height: 0;
}
/* level badge */
.level-badge {
  font-size: 11px;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 999px;
  width: fit-content;
  white-space: nowrap;
  letter-spacing: 0.02em;
}
.level-purple {
  background: rgba(124, 58, 237, 0.15);
  color: #c4b5fd;
  border: 1px solid rgba(124, 58, 237, 0.3);
}
.level-cyan {
  background: rgba(8, 145, 178, 0.15);
  color: #67e8f9;
  border: 1px solid rgba(8, 145, 178, 0.3);
}
.level-amber {
  background: rgba(217, 119, 6, 0.15);
  color: #fcd34d;
  border: 1px solid rgba(217, 119, 6, 0.3);
}
.level-green {
  background: rgba(5, 150, 105, 0.15);
  color: #6ee7b7;
  border: 1px solid rgba(5, 150, 105, 0.3);
}
.level-red {
  background: rgba(220, 38, 38, 0.15);
  color: #fca5a5;
  border: 1px solid rgba(220, 38, 38, 0.3);
}
/* title */
.card-title {
  font-size: 17px;
  font-weight: 700;
  color: #f1f5f9;
  line-height: 1.4;
  margin: 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  transition: color 0.25s ease;
}
.course-card:hover .card-title {
  color: #c4b5fd;
}
/* description */
.card-desc {
  font-size: 13px;
  color: #94a3b8;
  line-height: 1.6;
  margin: 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
/* tags */
.tags {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin-top: 2px;
}
.tag {
  font-size: 11px;
  color: #cbd5e1;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 6px;
  padding: 3px 9px;
  white-space: nowrap;
}
/* ══════ INSTRUCTOR (matches blade: just a name span) ══════ */
.instructor {
  display: flex;
  align-items: center;
  gap: 8px;
  padding-top: 10px;
  border-top: 1px solid rgba(255, 255, 255, 0.06);
  margin-top: auto;
  flex-shrink: 0;
}
.instructor .name {
  font-size: 13px;
  color: #cbd5e1;
  font-weight: 500;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
/* ══════ FOOTER ══════ */
.card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding-top: 10px;
  border-top: 1px solid rgba(255, 255, 255, 0.06);
  flex-shrink: 0;
}
.meta {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}
.meta-item {
  display: flex;
  align-items: center;
  gap: 4px;
  font-size: 12px;
  color: #64748b;
  white-space: nowrap;
}
.meta-item i {
  font-size: 14px;
  color: #475569;
}
/* start button */
.start-btn {
  display: flex;
  align-items: center;
  gap: 5px;
  background: #7c3aed;
  color: #fff;
  font-size: 12px;
  font-weight: 600;
  padding: 6px 16px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  white-space: nowrap;
  transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
  box-shadow: 0 4px 16px rgba(124, 58, 237, 0.35);
  flex-shrink: 0;
}
.start-btn:hover {
  background: #8b5cf6;
  transform: translateY(-1px);
  box-shadow: 0 6px 20px rgba(124, 58, 237, 0.5);
}
.start-btn:active {
  transform: translateY(0);
  background: #6d28d9;
}
.start-btn i {
  font-size: 12px;
}
/* ═══════════════════════════════════════════════════════════════
   ANIMATIONS
   ═══════════════════════════════════════════════════════════════ */
@keyframes shimmer {
  0%   { background-position: -200% 0; }
  100% { background-position: 200% 0; }
}
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(30px); }
  to   { opacity: 1; transform: translateY(0); }
}
/* animate-fade-up (matches blade class) */
.animate-fade-up {
  animation: fadeUp 0.5s ease both;
  animation-delay: calc(var(--i, 0) * 0.05s);
}
/* ═══════════════════════════════════════════════════════════════
   RESPONSIVE
   ═══════════════════════════════════════════════════════════════ */
@media (max-width: 640px) {
  .card-footer {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
  .start-btn {
    width: 100%;
    justify-content: center;
  }
}














  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  body {
    font-family: 'Inter', sans-serif;
    background: #040d1a;
    color: #fff;
    overflow-x: hidden;
  }
  /* ── Gradient text animations ── */
  @keyframes gradientShift {
    0%   { background-position: 0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }





  .grad-text {
    background: linear-gradient(90deg, #a78bfa, #60a5fa, #f472b6, #a78bfa);
    background-size: 300% 300%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradientShift 4s ease infinite;
  }
  .grad-text-2 {
    background: linear-gradient(90deg, #60a5fa, #34d399, #a78bfa, #60a5fa);
    background-size: 300% 300%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradientShift 4s ease infinite;
  }
  /* ── Navbar ── */
   /* ── Navbar ── */
  #navbar {
    position: fixed; top: 0; left: 0; width: 100%; z-index: 100;
    padding: 16px 24px;
    display: flex; align-items: center; justify-content: space-between;
    transition: background .3s, box-shadow .3s;
  }
  #navbar.scrolled {
    background: rgba(10,22,40,0.95);
    backdrop-filter: blur(12px);
    box-shadow: 0 4px 30px rgba(0,0,0,.4);
  }
  .nav-logo { height: 40px; object-fit: contain; cursor: pointer; }
  .nav-links { display: flex; gap: 4px; list-style: none; }
  .nav-links a {
    display: inline-block; padding: 8px 16px; border-radius: 8px;
    font-size: 14px; font-weight: 500; color: #d1d5db;
    text-decoration: none; transition: all .2s;
  }
  .nav-links a:hover { color: #fff; background: rgba(255,255,255,.1); }
  .nav-links a.active {
    color: #a78bfa; background: rgba(124,58,237,.2);
    border: 1px solid rgba(124,58,237,.3);
  }
  .nav-right { display: flex; align-items: center; gap: 12px; }
  .user-btn {
    display: flex; align-items: center; gap: 8px;
    padding: 8px 12px; border-radius: 8px;
    border: 1px solid rgba(255,255,255,.2); background: transparent;
    color: #e5e7eb; font-size: 14px; font-weight: 500;
    cursor: pointer; transition: all .2s; white-space: nowrap;
  }
  .user-btn:hover { border-color: rgba(255,255,255,.4); color: #fff; }
  .avatar {
    width: 28px; height: 28px; border-radius: 50%;
    background: linear-gradient(135deg,#7c3aed,#4f46e5);
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 700; color: #fff; flex-shrink: 0;
  }
  /* ── Courses hero ── */
  #courses-page { background: #070e1c; min-height: 100vh; padding-top: 80px; }
  .courses-hero {
    position: relative; width: 100%;
    padding: 80px 24px 56px; text-align: center;
    background: #070e1c; overflow: hidden;
  }
  .blob {
    position: absolute; border-radius: 50%;
    filter: blur(80px); pointer-events: none;
  }
  .blob-1 {
    width: 420px; height: 420px;
    background: rgba(124,58,237,.13);
    top: -60px; left: 20%;
  }
  .blob-2 {
    width: 360px; height: 360px;
    background: rgba(79,70,229,.1);
    top: 20px; right: 18%;
  }
  .eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(124,58,237,.12);
    border: 1px solid rgba(124,58,237,.28);
    border-radius: 9999px; padding: 6px 16px;
    font-size: 12px; font-weight: 600; color: #a78bfa;
    letter-spacing: .06em; text-transform: uppercase;
    margin-bottom: 20px;
  }
  .courses-hero h1 {
    font-size: clamp(32px,5vw,52px); font-weight: 900;
    color: #fff; line-height: 1.15;
    letter-spacing: -.5px; margin: 0 0 14px;
  }
  .courses-hero .sub {
    font-size: 16px; color: #9ca3af;
    max-width: 480px; margin: 0 auto 32px; line-height: 1.7;
  }
  /* ── Hero search ── */
  .hero-search { max-width: 480px; margin: 0 auto; position: relative; }
  .hero-search i {
    position: absolute; left: 16px; top: 50%;
    transform: translateY(-50%);
    color: #6b7280; font-size: 16px; pointer-events: none;
  }
  .hero-search input {
    width: 100%; background: #0f1a2e;
    border: 1px solid rgba(255,255,255,.13); border-radius: 12px;
    padding: 14px 18px 14px 46px;
    color: #fff; font-size: 14px; outline: none;
    transition: border-color .2s; font-family: 'Inter', sans-serif;
  }
  .hero-search input::placeholder { color: #4b5563; }
  .hero-search input:hover  { border-color: rgba(124,58,237,.45); }
  .hero-search input:focus  { border-color: rgba(124,58,237,.8); }
  /* ── Sticky filter bar ── */
  .filter-bar {
    width: 100%; background: rgba(7,14,28,.95);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(255,255,255,.08);
    padding: 12px 0; position: sticky; top: 0; z-index: 40;
    transition: box-shadow .3s;
    a {
  text-decoration: none;
}
  }
  .filter-bar.shadow { box-shadow: 0 4px 24px rgba(0,0,0,.4); }
  .filter-inner {
    max-width: 1280px; margin: 0 auto; padding: 0 24px;
  }
  .pill-bar { display: flex; gap: 8px; flex-wrap: wrap; }
  .pill {
    font-size: 12px; font-weight: 500;
    padding: 6px 16px; border-radius: 9999px;
    border: 1px solid rgba(255,255,255,.15);
    background: transparent; color: #9ca3af;
    cursor: pointer; white-space: nowrap; transition: all .2s;
    font-family: 'Inter', sans-serif;
  }
  .pill:hover  { border-color: rgba(124,58,237,.5); color: #e5e7eb; }
  .pill.active { background: #7c3aed; border-color: #7c3aed; color: #fff; }
  /* ── Courses main ── */
  .courses-main { max-width: 1280px; margin: 0 auto; padding: 40px 24px 80px; }
  .courses-header {
    display: flex; justify-content: space-between;
    align-items: flex-end; margin-bottom: 32px; gap: 16px;
  }
  .courses-header h3 {
    font-size: 22px; font-weight: 800; color: #fff; margin: 0 0 4px;
  }
  .courses-header p { font-size: 13px; color: #6b7280; margin: 0; }
  .sort-wrap { position: relative; }
  .sort-btn {
    display: flex; align-items: center; gap: 8px;
    padding: 9px 16px; background: #0f1a2e;
    border: 1px solid rgba(255,255,255,.12); border-radius: 10px;
    color: #d1d5db; font-size: 13px; font-family: 'Inter', sans-serif;
    cursor: pointer; white-space: nowrap; transition: all .2s;
  }
  .sort-btn:hover { border-color: rgba(124,58,237,.5); color: #fff; }
  .sort-btn i { color: #a78bfa; }
  .sort-btn .chevron { transition: transform .2s; }
  .sort-btn.open .chevron { transform: rotate(180deg); }
  .sort-dropdown {
    display: none; position: absolute; right: 0; top: calc(100% + 6px);
    background: #0f1a2e; border: 1px solid rgba(255,255,255,.1);
    border-radius: 12px; box-shadow: 0 16px 48px rgba(0,0,0,.5);
    overflow: hidden; padding: 4px 0; min-width: 160px; z-index: 50;
  }
  .sort-dropdown.open { display: block; }
  .sort-item {
    width: 100%; text-align: left; padding: 9px 16px;
    font-size: 13px; color: #d1d5db; background: none; border: none;
    font-family: 'Inter', sans-serif; cursor: pointer;
    white-space: nowrap; transition: all .15s;
  }
  .sort-item:hover  { background: rgba(255,255,255,.05); color: #fff; }
  .sort-item.active { color: #a78bfa; background: rgba(124,58,237,.12); }

 


   /* ── Course grid ── */
  .courses-grid {
    display: grid; grid-template-columns: repeat(3,1fr); gap: 24px;
  }
  @media(max-width:1024px){ .courses-grid{ grid-template-columns:repeat(2,1fr); } }
  @media(max-width:640px) {
    .courses-grid { grid-template-columns: 1fr; }
    .courses-header { flex-direction: column; align-items: flex-start; }
    #navbar { padding: 12px 16px; }
    .nav-links { display: none; }
  }
  
/* ── Course Card ── */



  
  /* ── Footer note ── */
  .footer-note {
    text-align: center;
    font-size: 13px;
    color: #374151;
    padding: 32px 0 24px;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    margin-top: 16px;
  }
  .footer-note a {
    color: #a78bfa;
    text-decoration: none;
    transition: color 0.2s;
  }
  .footer-note a:hover { color: #c4b5fd; }
  /* ── Responsive ── */
  @media (max-width: 1024px) {
    .courses-grid { grid-template-columns: repeat(2, 1fr); }
    .nav-links    { display: none; }
  }
  @media (max-width: 768px) {
    .courses-header {
      flex-direction: column;
      align-items: flex-start;
    }
    .courses-hero { padding: 60px 16px 40px; }
    .courses-hero h1 { font-size: 28px; }
    .courses-hero .sub { font-size: 14px; }
    .hero-search { max-width: 100%; }
    .courses-main { padding: 24px 16px 60px; }
  }
  @media (max-width: 640px) {
    .courses-grid  { grid-template-columns: 1fr; }
    .pill-bar      { gap: 6px; }
    .pill          { font-size: 11px; padding: 5px 12px; }
    .card-footer   { flex-direction: column; align-items: flex-start; gap: 10px; }
    .start-btn     { width: 100%; justify-content: center; }
    .meta          { gap: 10px; }
  }
  @media (max-width: 480px) {
    .nav-right .btn-primary { display: none; }
    .courses-hero h1        { font-size: 24px; }
    .hero-stats             { gap: 20px; padding: 16px; }
    .hero-stat .val         { font-size: 20px; }
  }
    
   .navbar {
      position: fixed; top: 0; left: 0; right: 0; height: 64px;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 32px; z-index: 100;
      background: rgba(0, 0, 0, 0.1); backdrop-filter: blur(120vh);
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .nav-logo { font-weight: 800; font-size: 20px; color: #fff; letter-spacing: -0.5px; }
    .nav-logo span { color: #c4b5fd; }
    .nav-links { display: flex; gap: 32px; list-style: none; }
    .nav-links a { color: #9ca3af; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.2s; }
    .nav-links a:hover { color: #a78bfa; }
    .nav-right { display: flex; align-items: center; gap: 16px; }
    .btn-nav { padding: 8px 20px; border-radius: 10px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; white-space: nowrap; transition: all 0.2s; }
    .btn-nav-primary { color: #fff; background: linear-gradient(135deg, #7c3aed, #4f46e5); }
    .btn-nav-primary:hover { transform: scale(1.05); }
    .hero-search{
    position: relative;
    width: 500px;
}

.hero-search input{
    width: 100%;
    padding: 15px 120px 15px 50px;
    border-radius: 50px;
    border: 1px solid #6388cc93;
    background-color: #0f1a2e93;
    color: white;
    font-size: 16px;
    outline: none;
}

.search-icon{
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: white;
    font-size: 20px;
}

.search-btn{
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);

    background-color: #6388cc;
    border: none;
    color: white;

    padding: 8px 18px;
    border-radius: 30px;

    cursor: pointer;
    font-size: 14px;
}



</style>
</head>
<body>
  <!-- ══════════════ NAVBAR ══════════════ -->
  
    <nav class="navbar">
    <div style="margin-top:10px;" class="nav-logo">Code<span>Master</span></div>
    <ul class="nav-links">
      <li><a href="/home">Home</a></li>
      <li><a href="#courses">Courses</a></li>
      <li><a href="#features">Features</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    
    <div class="nav-right">
      <button class="user-btn">
        <div class="avatar">R</div>
        rihamjohari81
        <i class="ri-arrow-down-s-line"></i>
      </button>
     
    </div>
  </nav>
  <!-- ══════════════ COURSES PAGE ══════════════ -->
  <div id="courses-page">
    <!-- Hero -->
  
    <section class="courses-hero">

    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="eyebrow">
        <i class="ri-graduation-cap-line"></i>
        Expert-Led Courses
    </div>

    <h1>
        Explore <span class="grad-text">Courses</span>
    </h1>

    <p class="sub">
        Master programming with expert-led video courses.
        Pick a language and start building today.
    </p>

    <!-- SEARCH FORM -->
    <form action="{{route('cours')}}" method="GET">

        <div class="hero-search">

            <i  class="ri-search-line"></i>

            <input
                type="text"
                id="heroSearch"
                name="search"
                placeholder="Search courses..."
                value="{{ request('search') }}"
            />

            <button type="submit" class="search-btn">
        Search
    </button>

        </div>

    </form>

</section>
    <!-- Filter bar -->
 
    <div class="filter-bar" id="filterBar">
  <div class="filter-inner">
    <div class="pill-bar" id="categoryPills">

      <a href="{{ route('cours') }}"
         class="pill {{ request('level') ? '' : 'active' }}">
        All
      </a>

      <a href="{{ route('cours', ['level' => 'Beginner']) }}"
         class="pill {{ request('level') == 'Beginner' ? 'active' : '' }}">
        Beginner
      </a>

      <a href="{{ route('cours', ['level' => 'Intermediate']) }}"
         class="pill {{ request('level') == 'Intermediate' ? 'active' : '' }}">
        Intermediate
      </a>

      <a href="{{ route('cours', ['level' => 'Advanced']) }}"
         class="pill {{ request('level') == 'Advanced' ? 'active' : '' }}">
        Advanced
      </a>

    </div>
  </div>
</div>
    <!-- Main -->
    <main class="courses-main">
      <div class="courses-header">
        <div>
          <h3><span class="grad-text" id="resultCount">
            {{$courses->count()}}
          </span> Courses Found</h3>
          <p>Showing all available courses</p>
        </div>
     
      </div>
      <div class="courses-grid" id="coursesGrid">
      

         
        <!-- Cards from db -->


@foreach($courses as $course)
<div class="course-card glow-hover animate-fade-up" style="--i: {{ $loop->index }}">

    <!-- THUMBNAIL -->
    <div class="card-thumb">

        <img src="{{ $course->image }}" alt="{{ $course->title }}" />

        <div class="overlay"></div>

        <!-- CATEGORY -->
        <div class="cat-badge">
            <i class="ri-server-line"></i>
            <span>{{ $course->module->title ?? 'No Module' }}</span>
        </div>

        <!-- PLAY BUTTON -->
        <div class="play-btn">
            <div class="circle">
                <i class="ri-play-fill"></i>
            </div>
        </div>

    </div>

    <!-- BODY -->
    <div class="card-body">

        <!-- LEVEL -->
        <span class="level-badge level-purple">
            {{ $course->difficulty->levelName ?? 'No Level' }}
        </span>

        <!-- TITLE -->
        <h3 class="card-title">
            {{ $course->title }}
        </h3>

        <!-- DESCRIPTION -->
        <p class="card-desc">
            {{ $course->description }}
        </p>

        <!-- TAGS (optional static or dynamic later) -->
        <div class="tags">
            <span class="tag">Course Content</span>
            <span class="tag">Practical Learning</span>
        </div>

       

        <!-- FOOTER -->
        <div class="card-footer">

            <div class="meta">


                <div class="meta-item">
                    <i class="ri-play-circle-line"></i>
                    <span>{{ $course->lessons }} lessons</span>
                </div>

            </div>

            <button class="start-btn">
                <i class="ri-play-fill"></i>
                Start
            </button>

        </div>

    </div>
</div>
@endforeach
</div>




</div>
     
    </main>
    <div class="footer-note">
      &copy; 2026 CodeMaster &nbsp;·&nbsp;
      <a href="#">Privacy</a> &nbsp;·&nbsp;
      <a href="#">Terms</a>
    </div>
  </div>
  <!-- ══════════════ JS ══════════════ -->
  <script>
    /* navbar scroll */
    window.addEventListener('scroll', () => {
      document.getElementById('navbar')
        .classList.toggle('scrolled', window.scrollY > 20);
      document.getElementById('filterBar')
        .classList.toggle('shadow', window.scrollY > 320);
    });
    /* category pills */
    document.getElementById('categoryPills')
      .addEventListener('click', e => {
        const btn = e.target.closest('[data-cat]');
        if (!btn) return;
        document.querySelectorAll('[data-cat]')
          .forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const cat = btn.dataset.cat;
        let n = 0;
        document.querySelectorAll('.course-card').forEach(c => {
          const show = cat === 'All' || c.dataset.cat === cat;
          c.style.display = show ? 'flex' : 'none';
          if (show) n++;
        });
        document.getElementById('resultCount').textContent = n;
      });
    /* sort toggle */
    const sortBtn      = document.getElementById('sortBtn');
    const sortDropdown = document.getElementById('sortDropdown');
    sortBtn.addEventListener('click', e => {
      e.stopPropagation();
      sortBtn.classList.toggle('open');
      sortDropdown.classList.toggle('open');
    });
    document.addEventListener('click', () => {
      sortBtn.classList.remove('open');
      sortDropdown.classList.remove('open');
    });
    document.querySelectorAll('.sort-item').forEach(item => {
      item.addEventListener('click', e => {
        e.stopPropagation();
        document.querySelectorAll('.sort-item')
          .forEach(i => i.classList.remove('active'));
        item.classList.add('active');
        document.getElementById('sortLabel').textContent = item.dataset.sort;
        sortBtn.classList.remove('open');
        sortDropdown.classList.remove('open');
      });
    });
    /* hero search */
    document.getElementById('heroSearch').addEventListener('input', e => {
      const q = e.target.value.toLowerCase();
      let n = 0;
      document.querySelectorAll('.course-card').forEach(c => {
        const show = c.textContent.toLowerCase().includes(q);
        c.style.display = show ? 'flex' : 'none';
        if (show) n++;
      });
      document.getElementById('resultCount').textContent = n;
    });
  </script>
</body>
</html>