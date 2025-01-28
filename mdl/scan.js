// Initialisation des variables pour le score et les QR codes scannés
let currentScore = 0;
let scannedQRCodeIds = new Set(); // Set pour éviter les doublons

// Fonction pour démarrer la chasse aux QR codes
function startGame() {
    const video = document.getElementById("qr-video");
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    // Accéder à la caméra de l'utilisateur
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
        .then((stream) => {
            video.srcObject = stream;
            video.setAttribute("playsinline", true); // Assurer la compatibilité avec les appareils mobiles
            video.play();
            requestAnimationFrame(scanQRCode); // Démarrer la boucle de scan des QR codes
        })
        .catch(err => {
            console.error("Erreur d'accès à la caméra:", err);
        });

    // Fonction de scan en continu des QR codes
    function scanQRCode() {
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            canvas.height = video.videoHeight;
            canvas.width = video.videoWidth;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, canvas.width, canvas.height);

            // Si un QR code est détecté
            if (code) {
                const qrCodeId = code.data; // L'identifiant du QR code scanné

                // Si ce QR code n'a pas déjà été scanné
                if (!scannedQRCodeIds.has(qrCodeId)) {
                    scannedQRCodeIds.add(qrCodeId); // Ajouter l'ID du QR code au Set pour éviter les doublons
                    currentScore += 10; // Ajouter 10 points pour chaque QR code unique scanné
                    document.getElementById("score").innerText = "Score: " + currentScore; // Afficher le score mis à jour
                }
            }
        }

        // Demander à nouveau à la fonction de scan de s'exécuter
        requestAnimationFrame(scanQRCode);
    }
}
