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

        .geral{
            font-weight: bold;
        }

       

        .marca{
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
            
            margin-top: 280%;
            
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

    .marca {
        position: static;
        padding-left: 10px;
        
    }

    .geral{
        padding-left: 10px;
    }

    .footer {
        padding: 10px;
        width: 100%;
    }
}

@media (max-width: 500px) {
    .logofooter {
        height: 60px;
        width: 60px;
    }

    .footer {
        font-size: 14px;
        
    }

    .marca{
        position: static;
        text-align: center;
    }
    
    .geral{
        position:static;
        padding-left: 8px;
    }
}
        
           
        
    </style>
</head>
<body>
    <div class="footer">

        <img src="imagens/MR_processed.png" class="logofooter">
        <h3 class="marca">Market Recycla</h3>
        
        <div class="links">
            <a href="#">Política de Privacidade</a>  
            <br>
            <a href="#">Termos de Uso</a>  
            <br>
            <a href="https://github.com/mateuscadete/marketrecycla" target="_blank">GitHub do Market Recycla</a>       
            </div>

        

        <p class="geral">&copy; Todos os direitos reservados 2024</p>
    </div>
</body>
</html>