<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 200, // Numero de partículas
                density: {
                    enable: true
                }
            },
            color: {
                value: "#000"
            },
            shape: {
                type: "image", // Forma de la partícula
                image: {
                    src: "/assets/img/chat.png",
                }
            },
            opacity: {
                value: 1,
                random: false
            },
            size: {
                value: 20, // Tamaño de la partícula
                random: false
            },
            line_linked: {
                enable: false
            },
            move: {
                enable: true,
                speed: 7,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false,
                attract: {
                    enable: false,
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: true,
                    mode: "repulse",
                    distance: 20,
                    duration: 0.2
                },
                onclick: {
                    enable: true
                }
            },
        },
        retina_detect: true
    });
</script>
