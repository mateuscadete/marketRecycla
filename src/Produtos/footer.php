
    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=League+Spartan:wght@100..900&display=swap');

        .logofooter{
            height: 80px;
            width: 80px;
            right:45%;
            position:relative;
        }

        .links{
            font-weight: bold;
        }

        p{
            font-weight: bold;
        }

       

        h3{
            color:green;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            position: absolute;
            left:10px
        }
        .footer {
            background-color: #343A40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            
            margin-top: 600%;
            
        }
        .footer a {
            color: green;
            text-decoration: none;
            
        }
        .footer a:hover {
            text-decoration: underline;
        }
            
        @media (max-width: 768px) {
    .logofooter {
        right: 0;
        margin: 0 auto;
        display: block;
    }

    h3 {
        position: static;
        text-align: center;
    }

    .footer {
        padding: 10px;
    }
}

@media (max-width: 480px) {
    .logofooter {
        height: 60px;
        width: 60px;
    }

    .footer {
        font-size: 14px;
    }
}
        
           
        
    </style>
</head>
<body>
    <div class="footer">

        <img src="../../imagens/MR_processed.png" class="logofooter">
        <h3>Market Recycla</h3>
        
        <div class="links">
            <a href="#">Política de Privacidade</a>  
            <br>
            <a href="#">Termos de Uso</a>  
            <br>
            <a href="https://github.com/mateuscadete/marketrecycla" target="_blank">GitHub do Market Recycla</a>       
            </div>

        

        <p>&copy; Todos os direitos reservados 2024</p>
    </div>
</body>
</html>