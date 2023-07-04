<?php


            // Inicia a sessao
            session_start();

            // Se existir a marcacao de estar logado
            if(isset($_SESSION["logado"]) == true) {
                //Se a maracacao esta True

                // Exibe o nome do usuario
                echo "Ola " . $_SESSION["nome"];
            } else {
                // Se a marcacao nao existir ou for falsa

                // Direciona paga a pagina de login com a mensagem de erro
                header("location:loginadmin.php?msg=PRIMEIRO VOCÊ DEVE LOGAR");
            }
        

require_once 'conexao/conecta.php';

            $ordem = $_POST['IMAGEM_ORDEM'];                                          //$_POST['IMAGEM_ORDEM'];
            
            $produto_id = $_POST['PRODUTO_ID'];                                         //$_POST['PRODUTO_ID'];
           



$IMGUR_CLIENT_ID = "0c88cbb379631dc";


$slt = $pdo->query("SELECT IMAGEM_ORDEM FROM PRODUTO_IMAGEM WHERE PRODUTO_ID =" . $produto_id);
    
    
    while($linha = $slt->fetch()){
        
            if($linha == $slt){
                die("<script language='javascript' type='text/javascript'>
                alert('ERRO: Já existe imagem nesta ordem');window.location
                .href='.php';</script>");
            }
            }

 

if(empty($_FILES["imagem"]["name"])){ 
    die('Selecione um arquivo para fazer o upload');
} 


    if(isset($_POST['cadastrar'])){
        $tipos_permitidos = ['jpg', 'jpeg', 'png'];

        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    }

    
   

    if(in_array($extensao, $tipos_permitidos)){

                    // Abre o arquivo

                    $handle = fopen($_FILES['imagem']['tmp_name'], "rb");
                    $image_source = stream_get_contents($handle, filesize($_FILES['imagem']['tmp_name']));

                    


            $ch = curl_init(); 
                    //Configura a url de destino
                    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
                    //Estabelece que sera via POST
                    curl_setopt($ch, CURLOPT_POST, TRUE); 
                    //Adiciona a Chave do servico ao cabecalho da requisicao
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID)); 
                    //Adiciona os campos 
                    curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => $image_source)); 
                    //Estabelece detalhes do processo
                    curl_setopt($ch, CURLOPT_VERBOSE, true);
                    //Informa que aguardara o retorno
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                
                    //
                    // Inicia o upload
                    //
                    $response = curl_exec($ch); 
                
                    //
                    // Se ocorreu algum erro no processo de upload para o Servico IMGUR
                    //
                    if(curl_errno($ch)) {
                        echo 'Curl erro: '.curl_error($ch);
                        die();
                    }
                    
                
                    //
                    // Captura a resposta do upload
                    //
                    curl_close($ch); 
                    $responseArr = json_decode($response); 
                    
                    //
                    // Se o conteudo enviado nao for vazio, ou seja, tem um Link para a imagem, a exibe
                    //
                    if(!empty($responseArr->data->link)){ 
                        //AQUI VOCE VAI INSERRIR NO BANCO O LINK ABAIXO
                
                        // $responseArr->data->link retorna o Link da imagem

                        // Exibe a imagem
                        // echo '<img src="' . $responseArr->data->link . '"</>';
                        
                        // Link para ir para o IMGUR
                        // echo "<br>";
                        // echo '<a href="' . $responseArr->data->link . '">Link para a imagem</a>';

                        $link =  $responseArr->data->link;

                    }

                        if(!empty($ordem) && !empty($produto_id)){

                             $cmdtext = "INSERT INTO PRODUTO_IMAGEM (IMAGEM_ORDEM, PRODUTO_ID, IMAGEM_URL) 
                                        VALUES(:ordem, :produto_id, :link)";
                                        $cmd = $pdo->prepare($cmdtext);
                                        $cmd->bindParam(':ordem', $ordem);
                                        $cmd->bindParam(':produto_id', $produto_id);
                                        $cmd->bindParam(':link', $link);
                                        $cmd->execute();
                                    
                                        echo   "<script language='javascript' type='text/javascript'>
                                        alert('Imagem cadastrada com sucesso');window.location
                                        .href='listarimagem.php';</script>";

                            // $slt = $pdo->query("SELECT * FROM PRODUTO_IMAGEM WHERE IMAGEM_ORDEM =" . $ordem)->fetch();

                            // $ordem2 = $slt['IMAGEM_ORDEM'];

                            //     if($ordem2 == $ordem && !empty($produto_id)){

                            //         $cmdtext = "UPDATE PRODUTO_IMAGEM SET IMAGEM_ORDEM='". $ordem . "',  IMAGEM_URL = '" . $link . "' WHERE IMAGEM_ORDEM=" . $ordem;

                
                            //     $cmd = $pdo->prepare($cmdtext);
                            //     $cmd->execute();

                            //     echo "<script language='javascript' type='text/javascript'>
                            //     alert('Imagem atualizada com sucesso ');window.location
                            //     .href='listarimagem.php';</script>";


                                        }else{                                        
                                                                                       
                                    
                                        // $cmdtext = "INSERT INTO PRODUTO_IMAGEM (IMAGEM_ORDEM, PRODUTO_ID, IMAGEM_URL) 
                                        // VALUES(:ordem, :produto_id, :link)";
                                        // $cmd = $pdo->prepare($cmdtext);
                                        // $cmd->bindParam(':ordem', $ordem);
                                        // $cmd->bindParam(':produto_id', $produto_id);
                                        // $cmd->bindParam(':link', $link);
                                        // $cmd->execute();
                                    
                                        echo   "<script language='javascript' type='text/javascript'>
                                        alert('ERRO: Verifique o produto ou ordem');window.location
                                        .href='listarimagem.php';</script>";
                                    }
                    
                                    
                                        
                }else{ 
                    // Formato de imagem nao permitido
                    echo 'Não é permitido esse formato de imagem'; 
                }  


                // COmo pega o ID da página? // Pegar o ID do produto // 
                // Colocar erro ao cadastrar imagem sem ter selecionado o produto




                // $id = $_POST["id"];
            // $id = intval($id);


                        // $ordem = $_POST['IMAGEM_ORDEM'];

                        // $nome = $_POST["nome"];
                        // $descricao = $_POST["descricao"];
                        // $preco = $_POST["preco"];
                        // $precoint = intval( $preco );
                        // $desconto = $_POST["desconto"];
                        // $descontoint = intval( $desconto );
                        // $categoriaId = $_POST["categoriaId"];
                        // $idcategoria = intval( $categoriaId );


                            
                        // //Monta o comando de Inserção no Banco
                        // if($nome == $nome){
                        //     $cmdtext = "INSERT INTO PRODUTO (PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, CATEGORIA_ID, PRODUTO_ATIVO) 
                        //     VALUES(''" . $nome . "','" . $descricao . "'," . $precoint . "," . $descontoint . "," . $categoriaId . ", 1)" ;
                        //     $cmd = $pdo->prepare($cmdtext);
                        // }else{
                        //     echo "erro";
                        // }

                        // $ultimoid = $pdo->lastinsertid;
