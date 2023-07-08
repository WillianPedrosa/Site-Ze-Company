<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Document</title>
</head>
<body class="fundoSite">



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <div class="container text-center sticky-top">
        <header class="row">
        <nav class="navbar navbar-expand-lg borda" style="background: linear-gradient(to bottom,  rgba(0,5,17,1) 0%, rgba(32,40,59,1) 55%, rgba(51,101,121,1) 100%); color: whitesmoke;">
                <a class="navbar-brand " href="index.html">
                    <img src='Zé Company123.png' alt="Bootstrap" class="icon">
                  </a>
                
                  <form class="container-fluid justify-content-start">
                    <div class="col-1">  
                        <button class="btn  me-2 sbb botaoHome"  type="button"><a href="Info.html" class="btn  me-2 sbb" style="color: rgb(235, 160, 22);">Sobre</a></button>
                    </div>

                    <div class="col-1">
                        <button class="btn  me-2 sbb botaoHome"  type="button"><a href="Mapas.html" class="btn  me-2 sbb" style="color: rgb(235, 160, 22);">Imagens</a></button>
                    </div>

                    <div class="col-2">
                        <button class="btn me-2 sbb botaoHome" type="button"><a href="Discucao.php" class="btn  me-2 sbb" style="color: rgb(235, 160, 22);">Discussão</a></button>
                    </div>

                    <div class="col-1">
                        <button class="btn me-2 sbb botaoHome" type="button"><a href="Suport.html" class="btn me-2 sbb" style="color: rgb(235, 160, 22);">Contato</a></button>
                    </div>

                    <div class="offset-3"></div>
                    <div class="col-2">
                        <input class="form-control me-2" type="search " placeholder="Search" aria-label="Search">
                    </div>

                    <div class="col-1">
                        <button class="btn btn-outline-success sbb" type="submit"><img src="lupa.png" alt="lupinha" width="30px" height="30px"></button>
                    </div>

                    <div class="col-1">
                        <button class="btn btn btn-danger" type="submit">Dowload</button>
                    </div>
                    
                </form>
                
            </nav>
        </header>
               
    </div>

    <div class="container indexInfo">
        <br> <br>
        <div class="row align-items-center indexInfoCorpo " style="background-color: rgb(0,5,17); color: whitesmoke;">
            
            <div class="col-8 offset-2 textosMeio">
                <h1 class="titulos border-bottom border-secondary border-4 rounded-bottom-3 text-center">Discussão</h1>    
                <form action="Discucao.php" method="POST">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control" style="background-color: rgb(102, 102, 102); color: rgb(255, 255, 255);">
                    <br>
                    <label for="mensagem" class="form-label">Mensagem:</label>
                    <br>
                    <textarea class="form-control TextArea" rows="5" name="mensagem" id="mensagem "style="background-color: rgb(102, 102, 102); color: rgb(255, 255, 255);" ></textarea>
                    <br>
                    <input class="btn btn-secondary" type="submit" name="submit" value="Enviar">
                    <br> <br>
                    <h1 class="titulos border-bottom border-secondary border-4 rounded-bottom-3 text-center">Comentarios</h1>
                    <?php 
                        if(isset($_POST['nome'])){
                            $nome = $_POST['nome'];
                        }
                        else{
                            $nome = false;
                        }
                    
                        if(isset($_POST['mensagem'])){
                            $mensagem = $_POST['mensagem'];
                        }
                        else{
                            $mensagem = false;
                        }
                    
                        if($nome && $mensagem){
                            try{
                                    $pdo = new pdo('mysql:host=localhost;dbname=zecompany;charset=utf8','root','');
                                    
                                    
                                    $query = "INSERT INTO discussao(mensagem,nome) VALUES ('$mensagem', '$nome')";
                                    $pdo-> exec($query);
                                    $comentarios = $pdo->query("SELECT * FROM discussao");
                                    
                                    $comentarios = $pdo->query("SELECT * FROM discussao");
                                    foreach($comentarios as $comentario){
                                        echo "<h3 class='font'>";
                                        echo $comentario["nome"];
                                        echo "</h3>";
                                        echo "<p class='font'>";
                                        echo $comentario["mensagem"];
                                        echo "</p>";
                                        echo "<p>";
                                        echo "-------------------------------------------";
                                        echo "</p>";
                                    }
                                }
                    
                            catch(pdoException $e){
                               echo "houve um erro na conexão: $e";
                            }
                        
                        }
                    ?>

                </form>
                

            </div>
            <!--<div class="col-3 offset-2">
                <img class="img img-fluid rounded-start" src="https://i.pinimg.com/550x/7e/d2/ed/7ed2ed089623c65f7a1c0666d9cda478.jpg" alt="galo de armadura" width="300px" height="300px">
            </div> !-->
        </div>  
    </div>


    
    
    

</body>
</html>