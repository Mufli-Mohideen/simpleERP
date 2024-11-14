<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleERP Preloader</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        @import url("https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap");
        
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .loader {
            width: fit-content;
            font-size: 150px;
            font-family: monospace;
            font-weight: bolder;
            text-transform: uppercase;
            color: #0000;
            -webkit-text-stroke: 1px #0056b3;
            background: conic-gradient(#0056b3 0 0) 0/0 100% no-repeat text;
            animation: l11 2s steps(8) infinite;
        }

        .loader:before {
            content: "Loading";
        }

        @keyframes l11 {
            to {background-size: calc(800%/7) 100%}
        }
        
    </style>
</head>
<body>

    <div class="loader-container">
        <div class="loader"></div>
    </div>


</body>
</html>
