<?php

require_once 'conexao/conecta.php';


            $ordem = $_POST['IMAGEM_ORDEM'];            
            // $produto_id = $_POST['PRODUTO_ID'];
            $id = $_POST['id'];
           
            




$IMGUR_CLIENT_ID = "0c88cbb379631dc";

 

if(empty($_FILES["imagem"]["name"])){ 
    die('Selecione um arquivo para fazer a atualização');
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
            echo '<img src="' . $responseArr->data->link . '"</>';
            // Link para ir para o IMGUR
            // echo "<br>";
            // echo '<a href="' . $responseArr->data->link . '">Link para a imagem</a>';

            $link =  $responseArr->data->link;

            if(!empty($ordem)){             

                
                              
               
                // $cmdtext = "UPDATE PRODUTO_IMAGEM SET (IMAGEM_ORDEM='". $ordem . "',  PRODUTO_ID = '" . $produto_id . "', IMAGEM_URL = '" . $link . "' WHERE IMAGEM_ID=" .$id;

                 $cmdtext = "UPDATE PRODUTO_IMAGEM SET IMAGEM_ORDEM='". $ordem . "',  IMAGEM_URL = '" . $link . "' WHERE IMAGEM_ID=" . 1;

                $cmd = $pdo->prepare($cmdtext);
                // $cmd->bindParam(':ordem', $ordem);
                // $cmd->bindParam(':produto_id', $produto_id);
                // $cmd->bindParam(':link', $link);
                $cmd->execute();
            
                echo   "<script language='javascript' type='text/javascript'>
                alert('Imagem atualizada com sucesso');window.location
                .href='listarimagem.php';</script>";
                    
            }else{
                echo"<script language='javascript' type='text/javascript'>
                alert('Defina uma ordem de 1 a 3');window.location
                .href='listarimagem.php';</script>";
            }

            
            


        }else{ 
            // Caso tenha algum erro         
            echo 'ERRO: Imagem não foi inserida'; 
        } 
     }else{ 
        // Formato de imagem nao permitido
        echo 'Não é permitido esse formato de imagem'; 
     }
     
     



//  Pegar o ID para dar o update 
