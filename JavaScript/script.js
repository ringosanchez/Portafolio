document.addEventListener("DOMContentLoaded", function () {
  const skillsLink = document.getElementById("skills-link");

  function contarPorcentaje(elementoSpan, porcentajeFinal) {
    let contador = 0;
    const duracion = 1500;
    const incremento = porcentajeFinal / (duracion / 10);

    const interval = setInterval(() => {
      contador += incremento;

      if (contador >= porcentajeFinal) {
        contador = porcentajeFinal;
        clearInterval(interval);
      }

      elementoSpan.textContent = Math.round(contador) + "%";
    }, 8);
  }

  function fillSkillBars() {
    const skillBars = document.querySelectorAll(".llenar-habilidades");
    skillBars.forEach((bar) => {
      const percentage = parseInt(bar.getAttribute("data-percentage"));
      const percentageSpan = bar
        .closest(".habilidades")
        .querySelector(".contador-porcentaje");
      bar.style.width = " 0%";
      if (percentageSpan) {
        percentageSpan.textContent = " 0%";
      }
      setTimeout(() => {
        bar.style.width = percentage + "%";

        if (percentageSpan) {
          contarPorcentaje(percentageSpan, percentage);
        }
      }, 1500);
    });
  }
  skillsLink.addEventListener("click", function (event) {
    event.preventDefault();
    fillSkillBars();
    const skillsSection = document.getElementById("Habilidades");
    skillsSection.scrollIntoView({ behavior: "smooth" });
  });

  // --- Código del Menú Hamburguesa MODIFICADO ---

  const hamburgerBtn = document.getElementById("hamburger-btn");
  const mainNav = document.getElementById("main-nav");

  // 1. Define la media query para móviles (ajusta el valor según tu CSS)
  const mobileMediaQuery = window.matchMedia("(max-width: 768px)");

  // Función para manejar la lógica del menú de hamburguesa
  function handleMobileMenu(e) {
    // La propiedad 'matches' es true si la media query se cumple
    if (e.matches) {
      // SOLO si estamos en móvil: Agrega los eventos
      if (hamburgerBtn && mainNav) {
        // Usa un flag para evitar agregar múltiples listeners si el cambio de tamaño es rápido
        if (!mainNav.dataset.listenersAdded) {
          
          // Evento principal para alternar la clase 'active'
          const toggleMenu = () => {
            mainNav.classList.toggle("active");
          };
          
          hamburgerBtn.addEventListener("click", toggleMenu);

          // Evento para cerrar el menú al hacer clic en un enlace
          mainNav.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", () => {
              if (mainNav.classList.contains("active")) {
                mainNav.classList.remove("active");
              }
            });
          });
          mainNav.dataset.listenersAdded = 'true';
        }
      }
    } else {

      if (mainNav.classList.contains("active")) {
          mainNav.classList.remove("active");
      }
    }
  }

  // 3. Llama a la función una vez para establecer el estado inicial
  handleMobileMenu(mobileMediaQuery);

  // 4. Escucha los cambios en el estado de la media query
  // (cuando la pantalla se hace más grande o más pequeña del breakpoint)
  mobileMediaQuery.addEventListener("change", handleMobileMenu);
});