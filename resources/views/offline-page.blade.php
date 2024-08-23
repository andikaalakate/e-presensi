    <!DOCTYPE html>
    <html lang="en">

    <head>
        @laravelPWA
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="e-Presensi siswa di SMK Swasta Jambi Medan" />
        <meta name="copyright" content="GADAK Studio 2024 - ePresensi SMK Swasta Jambi Medan">
        <meta name="author" content="Andika Pratama, M. Gilang Chandrawinata">
        <title>Offline!</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            * {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
            }

            .offline-container {
                background-color: #005A8D;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }

            .offline-text-container {
                color: white;
                margin: 16px 0;
                text-align: center;
            }

            .offline-text-container h1 {
                font-weight: 500;
                font-size: 36px
            }

            .offline-text-container p {
                font-weight: 300
            }

            a {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>

    <body>
        <div class="offline-container">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24"
                style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                <path
                    d="M3 16h2v5H3zm4-3h2v8H7zM21 3h-2v14.59l-2-2V7h-2v6.59l-2-2V10h-1.59l-7.7-7.71-1.42 1.42 18 18 1.42-1.42-.71-.7V3zm-6 18h1.88L15 19.12V21zm-4 0h2v-3.88l-2-2V21z">
                </path>
            </svg>
            <div class="  offline-text-container">
                <h1 class=" ">We can't detect internet on your device!</h1>
                <p class=" ">Please connect your device with an Internet and try again </p>
            </div>
            <a href="." class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                    <path
                        d="M19.89 10.105a8.696 8.696 0 0 0-.789-1.456l-1.658 1.119a6.606 6.606 0 0 1 .987 2.345 6.659 6.659 0 0 1 0 2.648 6.495 6.495 0 0 1-.384 1.231 6.404 6.404 0 0 1-.603 1.112 6.654 6.654 0 0 1-1.776 1.775 6.606 6.606 0 0 1-2.343.987 6.734 6.734 0 0 1-2.646 0 6.55 6.55 0 0 1-3.317-1.788 6.605 6.605 0 0 1-1.408-2.088 6.613 6.613 0 0 1-.382-1.23 6.627 6.627 0 0 1 .382-3.877A6.551 6.551 0 0 1 7.36 8.797 6.628 6.628 0 0 1 9.446 7.39c.395-.167.81-.296 1.23-.382.107-.022.216-.032.324-.049V10l5-4-5-4v2.938a8.805 8.805 0 0 0-.725.111 8.512 8.512 0 0 0-3.063 1.29A8.566 8.566 0 0 0 4.11 16.77a8.535 8.535 0 0 0 1.835 2.724 8.614 8.614 0 0 0 2.721 1.833 8.55 8.55 0 0 0 5.061.499 8.576 8.576 0 0 0 6.162-5.056c.22-.52.389-1.061.5-1.608a8.643 8.643 0 0 0 0-3.45 8.684 8.684 0 0 0-.499-1.607z">
                    </path>
                </svg>
            </a>
        </div>
    </body>

    </html>
