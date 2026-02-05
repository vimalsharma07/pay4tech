<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Will you be my Valentine, {{ $secondName }}? 💕</title>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  background: #fee8e8;
  font-family: "Segoe UI", system-ui, sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow-x: hidden;
}

.page {
  width: 100%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
  transition: opacity 0.3s ease;
}

.page.hidden {
  display: none !important;
}

.card {
  background: #fff;
  border-radius: 24px;
  padding: 2rem 2.5rem;
  max-width: 420px;
  width: 100%;
  text-align: center;
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
  position: relative;
}

.step {
  display: none;
}

.step.active {
  display: block;
  animation: fadeIn 0.4s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(8px); }
  to { opacity: 1; transform: translateY(0); }
}

.illustration {
  font-size: 4rem;
  margin-bottom: 1rem;
  line-height: 1.2;
}

.step1-img { font-size: 4.5rem; }
.step2-img { font-size: 3.5rem; }
.step3-img { font-size: 4rem; }
.step4-img { font-size: 3.5rem; }

h1 {
  color: #1a1a1a;
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  line-height: 1.3;
}

.sub {
  color: #444;
  font-size: 0.95rem;
  font-weight: 400;
  margin-bottom: 1.5rem;
}

.buttons-wrap {
  display: flex;
  gap: 1rem;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin-top: 1rem;
  position: relative;
  min-height: 52px;
}

.btn {
  padding: 0.75rem 1.75rem;
  font-size: 1rem;
  font-weight: 600;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: transform 0.15s ease, box-shadow 0.15s ease;
  position: relative;
}

.btn-yes {
  background: #ff6b9d;
  color: #fff;
  box-shadow: 0 4px 14px rgba(255, 107, 157, 0.4);
}

.btn-yes:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 20px rgba(255, 107, 157, 0.5);
}

.btn-no {
  background: #f0f0f0;
  color: #333;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  transition: left 0.15s ease, top 0.15s ease, transform 0.15s ease;
}

.btn-no:hover {
  transform: scale(1.02);
}

/* Success page */
.success-page {
  display: none;
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, #fee8e8 0%, #ffe0f0 100%);
}

.success-page.show {
  display: flex;
}

.success-card {
  padding: 2.5rem;
}

.success-emoji {
  font-size: 5rem;
  margin-bottom: 1rem;
  animation: bounce 0.6s ease infinite alternate;
}

@keyframes bounce {
  from { transform: scale(1); }
  to { transform: scale(1.1); }
}

.success-card h1 {
  font-size: 1.75rem;
  margin-bottom: 0.5rem;
}

.success-card p {
  color: #666;
  font-size: 1rem;
}

/* WhatsApp share - top right */
.whatsapp-share {
  position: fixed;
  top: 1rem;
  right: 1rem;
  z-index: 100;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 48px;
  height: 48px;
  background: #25D366;
  color: #fff;
  border-radius: 50%;
  box-shadow: 0 4px 14px rgba(37, 211, 102, 0.5);
  text-decoration: none;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.whatsapp-share:hover {
  transform: scale(1.08);
  box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
  color: #fff;
}
.whatsapp-share svg {
  width: 26px;
  height: 26px;
}

  </style>
</head>
<body>
  <a href="https://wa.me/?text={{ rawurlencode('Will you be my Valentine? 💕 ' . $firstName . ' made this for you! ' . url()->current()) }}" class="whatsapp-share" target="_blank" rel="noopener" title="Share on WhatsApp" aria-label="Share on WhatsApp">
    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
  </a>
  <div class="page" id="main-page">
    <div class="card">
      <!-- Step 1: Do you love me? - user can click Yes or No -->
      <div class="step active" data-step="1">
        <div class="illustration step1-img">🐱</div>
        <h1>Do you love me? 😊</h1>
        <p class="sub">~{{ $firstName }} is all yours</p>
      </div>
      <!-- Step 2: After No - Please think again -->
      <div class="step" data-step="2">
        <div class="illustration step2-img">🐼</div>
        <h1>Please think again! 😟</h1>
        <p class="sub">itni jaldi nahi matt bolo 😠</p>
      </div>
      <!-- Step 3: Ek aur baar soch lo -->
      <div class="step" data-step="3">
        <div class="illustration step3-img">👻😢</div>
        <h1>Ek aur baar Soch lo! 🥺</h1>
        <p class="sub">kyu aisa kar rahi ho 🥺</p>
      </div>
      <!-- Step 4: Last step - Baby man jao na, No button runs away here only -->
      <div class="step" data-step="4">
        <div class="illustration step4-img">🐱🐱</div>
        <h1>{{ $secondName }}, man jao na! Kitna bhav khaogi 🎯</h1>
        <p class="sub">bhut git baat hai yaar 💔</p>
      </div>

      <div class="buttons-wrap">
        <button type="button" class="btn btn-yes" id="btn-yes">Yes</button>
        <button type="button" class="btn btn-no" id="btn-no">No</button>
      </div>
    </div>
  </div>

  <!-- Success screen -->
  <div class="page success-page" id="success-page">
    <div class="card success-card">
      <div class="success-emoji">💕</div>
      <h1>Yay {{ $secondName }}! I knew it! 🥳</h1>
      <p>{{ $firstName }} & {{ $secondName }} — You're the best! Happy Valentine's! 💖</p>
    </div>
  </div>

  <script>
    (function () {
  "use strict";

  const btnYes = document.getElementById("btn-yes");
  const btnNo = document.getElementById("btn-no");
  const mainPage = document.getElementById("main-page");
  const successPage = document.getElementById("success-page");
  const steps = document.querySelectorAll(".step");
  const buttonsWrap = document.querySelector(".buttons-wrap");

  let currentStep = 1;
  const totalSteps = 4;
  let moveCooldown = false;

  function showStep(stepNum) {
    currentStep = stepNum;
    steps.forEach(function (step) {
      step.classList.toggle("active", parseInt(step.dataset.step, 10) === stepNum);
    });
    // Reset No button position when step changes
    btnNo.style.position = "";
    btnNo.style.left = "";
    btnNo.style.top = "";
  }

  function goToSuccess() {
    mainPage.classList.add("hidden");
    successPage.classList.add("show");
  }

  // Yes: always goes to success
  btnYes.addEventListener("click", goToSuccess);

  // No: step 1–3 go to next step; step 4 (last) has running No, so we only move the button (no click needed)
  btnNo.addEventListener("click", function () {
    if (currentStep < totalSteps) {
      showStep(currentStep + 1);
    }
    // On last step, No runs away so they rarely click it; if they do, just stay on step 4
  });

  // --- Run away only on LAST step ---
  function getRandomPosition() {
    const wrap = buttonsWrap.getBoundingClientRect();
    const btn = btnNo.getBoundingClientRect();
    const padding = 20;
    const maxX = wrap.width - btn.width - padding;
    const maxY = wrap.height - btn.height - padding;
    const minX = padding;
    const minY = padding;
    const x = Math.random() * Math.max(0, maxX - minX) + minX;
    const y = Math.random() * Math.max(0, maxY - minY) + minY;
    return { x, y };
  }

  function moveNoButton() {
    if (currentStep !== totalSteps) return; // only move on last step
    if (moveCooldown) return;
    moveCooldown = true;
    setTimeout(function () { moveCooldown = false; }, 200);

    const pos = getRandomPosition();
    btnNo.style.position = "absolute";
    btnNo.style.left = pos.x + "px";
    btnNo.style.top = pos.y + "px";
  }

  btnNo.addEventListener("mouseenter", function () {
    moveNoButton();
  });

  document.querySelector(".card").addEventListener("mousemove", function (e) {
    if (currentStep !== totalSteps) return;
    const noRect = btnNo.getBoundingClientRect();
    const dx = e.clientX - (noRect.left + noRect.width / 2);
    const dy = e.clientY - (noRect.top + noRect.height / 2);
    const dist = Math.sqrt(dx * dx + dy * dy);
    if (dist < 100) moveNoButton();
  });

  showStep(1);
})();

  </script>
</body>
</html>
