<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CodeMaster - Learn Programming Through Video</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; background: #0a0a0f; color: #fff; min-height: 100vh; overflow-x: hidden; }
    /* ===== NAVBAR ===== */
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
    /* ===== HERO ===== */
    .hero { position: relative; min-height: 100vh; display: flex; align-items: center; justify-content: center; overflow: hidden; padding-top: 64px; }
    .hero-bg { position: absolute; inset: 0; }
    .hero-bg img { width: 100%; height: 100%; object-fit: cover; object-position: top; }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(10,10,20,0.6) 0%, rgba(10,10,20,0.5) 50%, rgba(10,10,20,0.95) 100%); }
    .hero-glow-1 { position: absolute; top: 25%; left: 16%; width: 280px; height: 280px; border-radius: 50%; background: radial-gradient(circle, #7c3aed, transparent); opacity: 0.2; filter: blur(60px); pointer-events: none; animation: glowPulse 3s ease-in-out infinite; }
    .hero-glow-2 { position: absolute; bottom: 33%; right: 16%; width: 380px; height: 380px; border-radius: 50%; background: radial-gradient(circle, #4f46e5, transparent); opacity: 0.15; filter: blur(60px); pointer-events: none; animation: glowPulse 3s ease-in-out infinite 1s; }
    @keyframes glowPulse { 0%,100%{ opacity:0.15; transform:scale(1); } 50%{ opacity:0.25; transform:scale(1.1); } }
    .hero-content { position: relative; width: 100%; max-width: 1000px; margin: 0 auto; padding: 0 24px; text-align: center; opacity: 0; transform: translateY(40px); animation: fadeUp 1s ease-out 0.3s forwards; }
    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    .badge-pill { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; border-radius: 999px; border: 1px solid rgba(139,92,246,0.3); background: rgba(124,58,237,0.1); backdrop-filter: blur(8px); margin-bottom: 32px; }
    .badge-dot { width: 8px; height: 8px; border-radius: 50%; background: #a78bfa; animation: pulse 2s ease-in-out infinite; }
    @keyframes pulse { 0%,100%{ opacity:1; } 50%{ opacity:0.4; } }
    .badge-text { color: #c4b5fd; font-size: 14px; font-weight: 500; }
    .hero-title { font-size: 64px; font-weight: 900; line-height: 1.1; margin-bottom: 24px; }
    .hero-title .white { color: #fff; }
    .hero-title .gradient { background: linear-gradient(90deg, #c4b5fd, #818cf8, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .hero-title .gradient2 { background: linear-gradient(90deg, #f0abfc, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .hero-desc { color: #9ca3af; font-size: 20px; max-width: 600px; margin: 0 auto 40px; line-height: 1.6; }
    .hero-buttons { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }
    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 16px 32px; border-radius: 16px; font-size: 16px; font-weight: 700; border: none; cursor: pointer; white-space: nowrap; transition: all 0.3s; text-decoration: none; }
    .btn-primary { color: #fff; background: linear-gradient(135deg, #7c3aed, #4f46e5); box-shadow: 0 0 40px rgba(124,58,237,0.4); }
    .btn-primary:hover { transform: scale(1.05); }
    .btn-secondary { color: #fff; background: rgba(255,255,255,0.06); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.2); }
    .btn-secondary:hover { border-color: rgba(139,92,246,0.5); transform: scale(1.05); }
    .track-badges { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-top: 48px; }
    .track-badge { display: flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); backdrop-filter: blur(8px); color: #d1d5db; font-size: 14px; font-weight: 500; }
    /* ===== STATS ===== */
    .stats { position: relative; padding: 80px 0; }
    .stats-glow { position: absolute; inset: 0; background: linear-gradient(90deg, transparent, rgba(124,58,237,0.1), transparent); opacity: 0.3; }
    .stats-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; padding: 0 24px; }
    @media (min-width: 768px) { .stats-grid { grid-template-columns: repeat(4, 1fr); } }
    .stat-card { text-align: center; padding: 24px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.03); opacity: 0; transform: translateY(30px); transition: all 0.7s ease-out; }
    .stat-card.visible { opacity: 1; transform: translateY(0); }
    .stat-icon { width: 56px; height: 56px; margin: 0 auto 16px; border-radius: 14px; display: flex; align-items: center; justify-content: center; background: rgba(124,58,237,0.15); border: 1px solid rgba(124,58,237,0.3); }
    .stat-icon i { font-size: 24px; }
    .stat-value { font-size: 32px; font-weight: 900; color: #fff; margin-bottom: 4px; }
    .stat-label { font-size: 14px; color: #6b7280; }
    /* ===== COURSES ===== */
    .courses-section { padding: 80px 0; }
    .section-header { max-width: 1200px; margin: 0 auto 48px; display: flex; justify-content: space-between; align-items: flex-end; padding: 0 24px; }
    .section-label { color: #a78bfa; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; margin-bottom: 8px; }
    .section-title { font-size: 40px; font-weight: 900; color: #fff; }
    .view-all { display: flex; align-items: center; gap: 4px; color: #a78bfa; font-size: 14px; font-weight: 500; text-decoration: none; transition: color 0.2s; }
    .view-all:hover { color: #c4b5fd; }
    .courses-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr; gap: 24px; padding: 0 24px; }
    @media (min-width: 768px) { .courses-grid { grid-template-columns: repeat(3, 1fr); } }
    .course-card { position: relative; border-radius: 16px; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); background: linear-gradient(145deg, rgba(255,255,255,0.06) 0%, rgba(255,255,255,0.02) 100%); cursor: pointer; transition: all 0.5s; }
    .course-card:hover { border-color: rgba(124,58,237,0.5); transform: translateY(-4px); }
    .course-img-wrap { position: relative; height: 180px; overflow: hidden; }
    .course-img-wrap img { width: 100%; height: 100%; object-fit: cover; object-position: top; transition: transform 0.7s; }
    .course-card:hover .course-img-wrap img { transform: scale(1.1); }
    .course-img-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(10,10,20,0.8)); }
    .course-badge { position: absolute; top: 12px; left: 12px; display: flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.2); background: rgba(0,0,0,0.6); backdrop-filter: blur(8px); font-size: 12px; font-weight: 600; color: #fff; }
    .course-rating { position: absolute; top: 12px; right: 12px; display: flex; align-items: center; gap: 4px; padding: 6px 10px; border-radius: 999px; background: rgba(0,0,0,0.6); backdrop-filter: blur(8px); font-size: 12px; font-weight: 700; color: #fff; }
    .course-rating i { color: #fbbf24; font-size: 11px; }
    .play-overlay { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s; }
    .course-card:hover .play-overlay { opacity: 1; }
    .play-btn { width: 56px; height: 56px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: rgba(124,58,237,0.8); border: 2px solid rgba(255,255,255,0.8); }
    .play-btn i { color: #fff; font-size: 24px; margin-left: 2px; }
    .course-body { padding: 20px; }
    .course-title { font-size: 16px; font-weight: 700; color: #fff; margin-bottom: 8px; transition: color 0.2s; }
    .course-card:hover .course-title { color: #c4b5fd; }
    .course-desc { color: #6b7280; font-size: 13px; line-height: 1.5; margin-bottom: 16px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .course-meta { display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: #6b7280; }
    .course-meta-left { display: flex; gap: 16px; }
    .course-meta-left span { display: flex; align-items: center; gap: 4px; }
    .course-students {
  color: #a78bfa;
  font-weight: 600;
}
/* ===== FEATURES ===== */
.features {
  padding: 80px 0;
}
.features-header {
  text-align: center;
  margin-bottom: 56px;
  padding: 0 24px;
}
.features-header p {
  color: #9ca3af;
  max-width: 500px;
  margin: 0 auto;
  font-size: 16px;
}
.features-grid {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr;
  gap: 24px;
  padding: 0 24px;
}
@media (min-width: 768px) {
  .features-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
.feature-card {
  padding: 24px;
  border-radius: 16px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  background: rgba(255, 255, 255, 0.03);
  transition: all 0.3s;
}
.feature-card:hover {
  border-color: rgba(124, 58, 237, 0.3);
}
.feature-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(124, 58, 237, 0.15);
  border: 1px solid rgba(124, 58, 237, 0.3);
  margin-bottom: 20px;
}
.feature-icon i {
  font-size: 22px;
}
.feature-title {
  font-size: 16px;
  font-weight: 700;
  color: #fff;
  margin-bottom: 8px;
  transition: color 0.2s;
}
.feature-card:hover .feature-title {
  color: #c4b5fd;
}
.feature-desc {
  color: #6b7280;
  font-size: 14px;
  line-height: 1.6;
}
/* ===== CTA ===== */
.cta {
  padding: 80px 16px;
  margin: 0 16px 64px;
  border-radius: 24px;
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, rgba(124, 58, 237, 0.3) 0%, rgba(79, 70, 229, 0.3) 100%);
  border: 1px solid rgba(124, 58, 237, 0.3);
  text-align: center;
}
@media (min-width: 640px) {
  .cta {
    margin: 0 32px 64px;
  }
}
@media (min-width: 1024px) {
  .cta {
    margin: 0 64px 64px;
  }
}
.cta-glow {
  position: absolute;
  inset: 0;
  opacity: 0.2;
  background:
    radial-gradient(circle at 30% 50%, #7c3aed, transparent 60%),
    radial-gradient(circle at 70% 50%, #4f46e5, transparent 60%);
}
.cta-content {
  position: relative;
}
.cta h2 {
  font-size: 40px;
  font-weight: 900;
  color: #fff;
  margin-bottom: 16px;
}
.cta p {
  color: #9ca3af;
  font-size: 18px;
  max-width: 500px;
  margin: 0 auto 32px;
}
/* ===== FOOTER ===== */
.footer {
  padding: 48px 0;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  background: rgba(255, 255, 255, 0.02);
}
.footer-grid {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  padding: 0 24px;
  margin-bottom: 40px;
}
@media (min-width: 768px) {
  .footer-grid {
    grid-template-columns: 2fr 1fr 1fr 1fr;
  }
}
.footer-logo {
  font-size: 20px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 12px;
}
.footer-logo span {
  color: #c4b5fd;
}
.footer-desc {
  font-size: 14px;
  color: #6b7280;
  line-height: 1.6;
}
.footer-title {
  font-size: 14px;
  font-weight: 700;
  color: #fff;
  margin-bottom: 16px;
}
.footer-links {
  list-style: none;
}
.footer-links li {
  margin-bottom: 8px;
}
.footer-links a {
  color: #6b7280;
  text-decoration: none;
  font-size: 14px;
  transition: color 0.2s;
}
.footer-links a:hover {
  color: #a78bfa;
}
.socials {
  display: flex;
  gap: 12px;
}
.social {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(255, 255, 255, 0.1);
  background: rgba(255, 255, 255, 0.04);
  color: #9ca3af;
  text-decoration: none;
  transition: all 0.2s;
}
.social:hover {
  color: #a78bfa;
  border-color: rgba(139, 92, 246, 0.5);
}
.social i {
  font-size: 16px;
}
.footer-bottom {
  max-width: 1200px;
  margin: 0 auto;
  padding: 24px 24px 0;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  text-align: center;
  font-size: 14px;
  color: #4b5563;
}
/* ===== RESPONSIVE ===== */
@media (max-width: 640px) {
  .hero-title { font-size: 40px; }
  .hero-desc { font-size: 16px; }
  .navbar { padding: 0 16px; }
  .nav-links { display: none; }
  .section-title { font-size: 28px; }
  .cta h2 { font-size: 28px; }
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
}


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





</style>
<body>
  <!-- NAVBAR -->
   <nav class="navbar">
    <div style="margin-top:10px;" class="nav-logo">Code<span>Master</span></div>
    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
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
  <!-- HERO -->
  <section class="hero" id="home">
    <div class="hero-bg">
      <img src="https://readdy.ai/api/search-image?query=abstract dark futuristic technology background with glowing purple violet neon code particles and geometric grid lines, deep black background with subtle purple glow, cinematic digital art, ultra high quality 8k&width=1920&height=1080&seq=darkhero1&orientation=landscape" alt="Hero background" />
      <div class="hero-overlay"></div>
    </div>
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>
    <div class="hero-content">
      <div class="badge-pill">
        <div class="badge-dot"></div>
        <span class="badge-text">Learn by Watching. Build by Doing.</span>
      </div>
      <h1 class="hero-title">
        <span class="white">Master </span><span class="gradient">Programming</span><br>
        <span class="white">Through </span><span class="gradient2">Video</span>
      </h1>
      <p class="hero-desc">Three expert-led learning tracks that take you from programming basics to building production-grade web apps and scalable backend systems.</p>
      <div class="hero-buttons">
        <a href="#courses" class="btn btn-primary"><i class="ri-play-circle-fill"></i> Start Learning Free</a>
        <a href="#features" class="btn btn-secondary"><i class="ri-information-line"></i> Explore Features</a>
      </div>
      <div class="track-badges">
        <div class="track-badge"><i class="ri-code-s-slash-line" style="color:#F59E0B;"></i> Programming Fundamentals</div>
        <div class="track-badge"><i class="ri-global-line" style="color:#14B8A6;"></i> Web Development</div>
        <div class="track-badge"><i class="ri-server-line" style="color:#8B5CF6;"></i> Advanced Topics</div>
      </div>
    </div>
  </section>
  <!-- STATS -->
  <section class="stats">
    <div class="stats-glow"></div>
    <div class="stats-grid">
      <div class="stat-card" data-delay="0">
        <div class="stat-icon"><i class="ri-video-line" style="color:#c4b5fd;"></i></div>
        <div class="stat-value">20+</div>
        <div class="stat-label">Video Lessons</div>
      </div>
      <div class="stat-card" data-delay="100">
        <div class="stat-icon"><i class="ri-user-line" style="color:#a78bfa;"></i></div>
        <div class="stat-value">20K+</div>
        <div class="stat-label">Active Students</div>
      </div>
      <div class="stat-card" data-delay="200">
        <div class="stat-icon"><i class="ri-book-open-line" style="color:#818cf8;"></i></div>
        <div class="stat-value">3</div>
        <div class="stat-label">Learning Tracks</div>
      </div>
      <div class="stat-card" data-delay="300">
        <div class="stat-icon"><i class="ri-star-fill" style="color:#f0abfc;"></i></div>
        <div class="stat-value">4.8★</div>
        <div class="stat-label">Average Rating</div>
      </div>
    </div>
  </section>
  <!-- FEATURED COURSES -->
  <section class="courses-section" id="courses">
    <div class="section-header">
      <div>
        <div class="section-label">Top Picks</div>
        <h2 class="section-title">Featured Courses</h2>
      </div>
      <a href="/cours" class="view-all">View All <i class="ri-arrow-right-line"></i></a>
    </div>
    <div class="courses-grid">
      <!-- Course 1: Programming Fundamentals -->
      <div class="course-card" onclick="alert('Go to Programming Fundamentals')">
        <div class="course-img-wrap">
          <img src="https://readdy.ai/api/search-image?query=Abstract glowing code matrix with floating programming keywords like variables, functions, loops, arrays, glowing in warm amber and emerald green colors against a deep dark charcoal background, subtle geometric grid lines, modern minimalist tech aesthetic, cinematic lighting, ultra high quality digital art&width=800&height=500&seq=pfimg1&orientation=landscape" alt="Programming Fundamentals" />
          <div class="course-img-overlay"></div>
          <div class="course-badge"><i class="ri-code-s-slash-line" style="color:#F59E0B;"></i> Programming Fundamentals</div>
          <div class="course-rating"><i class="ri-star-fill"></i> 4.9</div>
          <div class="play-overlay">
            <div class="play-btn"><i class="ri-play-fill"></i></div>
          </div>
        </div>
        <div class="course-body">
          <h3 class="course-title">Programming Fundamentals</h3>
          <p class="course-desc">Learn Python basics, logic, and problem solving.</p>
          <div class="course-meta">
            <div class="course-meta-left">
              <span><i class="ri-time-line"></i> 36 hours</span>
              <span><i class="ri-play-circle-line"></i> 145 lessons</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Course 2: Web Development -->
      <div class="course-card" onclick="alert('Go to Web Development')">
        <div class="course-img-wrap">
          <img src="https://readdy.ai/api/search-image?query=Modern web browser window with glowing HTML CSS JavaScript code flowing outward, responsive layout grid visible, warm coral and teal gradient accents against deep dark charcoal background, floating UI components and wireframes, modern minimalist tech aesthetic, cinematic lighting, ultra high quality digital art&width=800&height=500&seq=wdimg1&orientation=landscape" alt="Web Development" />
          <div class="course-img-overlay"></div>
          <div class="course-badge"><i class="ri-global-line" style="color:#14B8A6;"></i> Web Development</div>
          <div class="course-rating"><i class="ri-star-fill"></i> 4.8</div>
          <div class="play-overlay">
            <div class="play-btn"><i class="ri-play-fill"></i></div>
          </div>
        </div>
        <div class="course-body">
          <h3 class="course-title">Web Development</h3>
          <p class="course-desc">Build websites using JavaScript, React, and frontend tools.</p>
          <div class="course-meta">
            <div class="course-meta-left">
              <span><i class="ri-time-line"></i> 44 hours</span>
              <span><i class="ri-play-circle-line"></i> 172 lessons</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Course 3: Advanced Backend & Advanced Topics -->
      <div class="course-card" onclick="alert('Go to Advanced Backend')">
        <div class="course-img-wrap">
          <img src="https://readdy.ai/api/search-image?query=Abstract server architecture diagram with interconnected microservices, glowing API endpoints, database clusters, and cloud infrastructure nodes, rendered in deep violet and rose gold tones against a dark charcoal background, data flow lines, modern minimalist tech aesthetic, cinematic lighting, ultra high quality digital art&width=800&height=500&seq=abimg1&orientation=landscape" alt="Advanced Backend" />
          <div class="course-img-overlay"></div>
          <div class="course-badge"><i class="ri-server-line" style="color:#8B5CF6;"></i> Advanced Topics</div>
          <div class="course-rating"><i class="ri-star-fill"></i> 4.9</div>
          <div class="play-overlay">
            <div class="play-btn"><i class="ri-play-fill"></i></div>
          </div>
        </div>
        <div class="course-body">
          <h3 class="course-title">Advanced Backend & Advanced Topics</h3>
          <p class="course-desc">Laravel, APIs, DevOps, cloud and cybersecurity skills.</p>
          <div class="course-meta">
            <div class="course-meta-left">
              <span><i class="ri-time-line"></i> 52 hours</span>
              <span><i class="ri-play-circle-line"></i> 198 lessons</span>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- WHY CHOOSE US -->
  <section class="features" id="features">
    <div class="features-header">
      <div class="section-label">Why Us</div>
      <h2 class="section-title" style="margin-bottom:16px;">Built for Developers</h2>
      <p>Everything you need to go from zero to job-ready in programming</p>
    </div>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon"><i class="ri-video-line" style="color:#c4b5fd;"></i></div>
        <h3 class="feature-title">HD Video Lessons</h3>
        <p class="feature-desc">Crystal-clear video content that makes complex concepts easy to grasp</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon"><i class="ri-code-s-slash-line" style="color:#a78bfa;"></i></div>
        <h3 class="feature-title">Hands-on Projects</h3>
        <p class="feature-desc">Apply your skills with real-world coding exercises and projects</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon"><i class="ri-trophy-line" style="color:#818cf8;"></i></div>
        <h3 class="feature-title">Earn Certificates</h3>
        <p class="feature-desc">Get recognized with completion certificates for every course</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon"><i class="ri-team-line" style="color:#f0abfc;"></i></div>
        <h3 class="feature-title">Expert Instructors</h3>
        <p class="feature-desc">Learn from industry professionals with years of real experience</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon"><i class="ri-time-line" style="color:#c4b5fd;"></i></div>
        <h3 class="feature-title">Learn at Your Pace</h3>
        <p class="feature-desc">Access all content anytime, anywhere, on any device</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon"><i class="ri-chat-3-line" style="color:#a78bfa;"></i></div>
        <h3 class="feature-title">Community Support</h3>
        <p class="feature-desc">Join thousands of learners and get help whenever you need it</p>
      </div>
    </div>
  </section>
  <!-- CTA -->
  <section class="cta">
    <div class="cta-glow"></div>
    <div class="cta-content">
      <h2>Ready to Start Coding?</h2>
      <p>Join thousands of students already mastering programming through our structured learning tracks</p>
      <a href="#courses" class="btn btn-primary">
        <i class="ri-rocket-line"></i> Browse All Courses
      </a>
    </div>
  </section>
  <!-- FOOTER -->
  <footer class="footer" id="contact">
    <div class="footer-grid">
      <div>
        <div class="footer-logo">Code<span>Master</span></div>
        <p class="footer-desc">Your gateway to mastering programming through expert video courses. Learn by watching, build by doing.</p>
      </div>
      <div>
        <h4 class="footer-title">Platform</h4>
        <ul class="footer-links">
          <li><a href="#courses">Courses</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4 class="footer-title">Learning Tracks</h4>
        <ul class="footer-links">
          <li><a href="#">Programming Fundamentals</a></li>
          <li><a href="#">Web Development</a></li>
          <li><a href="#">Advanced Topics</a></li>
        </ul>
      </div>
      <div>
        <h4 class="footer-title">Connect</h4>
        <div class="socials">
          <a href="#" class="social"><i class="ri-github-fill"></i></a>
          <a href="#" class="social"><i class="ri-twitter-fill"></i></a>
          <a href="#" class="social"><i class="ri-linkedin-fill"></i></a>
          <a href="#" class="social"><i class="ri-youtube-fill"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 CodeMaster LMS. All rights reserved.</p>
    </div>
  </footer>
</body>

  <script>
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.querySelectorAll('.stat-card').forEach((card, i) => {
            setTimeout(() => card.classList.add('visible'), i * 100);
          });
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
    document.querySelectorAll('.stats-grid').forEach(g => observer.observe(g));
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', function(e) {
        e.preventDefault();
        const t = document.querySelector(this.getAttribute('href'));
        if (t) t.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  </script>
</body>
</html>