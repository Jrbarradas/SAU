<?php


    // Require da classe responsável pela conexão com o banco de dados
	require './PDOClass.php';
	$import = new conPDO;
	$operacao = filter_input(INPUT_GET,'op');

	// Seleciona o arquivo passado via post, faz o decode do xml e armazena os valores dentro do foreach
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		
		
		$linhas = $arquivo->getElementsByTagName("Row");
		
		
		$primeira_linha = true;
		foreach($linhas as $linha){
			if($primeira_linha == false){

				// Colect Geral / Computadores
				$localizacao = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				$nome = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				$fabricante = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				$modelo = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				$servicetag = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				$uuid = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				$processador = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
				$memoria = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
				$disco = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
				$aquisicao = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
				$idade = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
				$suporte = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
				$vigencia = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
				$sistemaoperacional = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
				$office = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
				$patrimonio = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
				
				// Colect Específico - Rede
				$tipo = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				$aquisicao_rede = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
				$idade_rede = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
				$ipwan = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
				$iplan = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
				$dhcp = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
				$mascara = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
				$patrimonio_rede = $linha->getElementsByTagName("Data")->item(12)->nodeValue;

				//Colect Específico - Nobreaks

				$capacidade = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				$batInterna = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
				$batExterna = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
				$tensao = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
				$peso = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
				$aquisicao_nobreak = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
				$idade_nobreak = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
				$trocaBat = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
				$patrimonio_nb = $linha->getElementsByTagName("Data")->item(13)->nodeValue;



			}

			
			// Query e prepare da Query, execução será dentro do IF que verifica se a Query retornou erro também...
			switch($operacao){
			

			// Query e Updates referentes aos computadores em gerais
			// Cada tipo de computaddor é armazenado em uma tabela diferente, Desktop, Desktop Dell, Notebook, Notebook Dell, etc

			 case "dell":
			  $query = "INSERT INTO hwdesktop VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio')";
			   $update_vigencia = "update hwdesktop SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
			    $update_aquisicao = "update hwdesktop SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
			   break;
				
				case "variados":
					$query = "INSERT INTO hwdesktopnormal VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio')";
					 $update_vigencia = "update hwdesktopnormal SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
			    	  $update_aquisicao = "update hwdesktopnormal SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
					break;

					case "notedell":
					  $query = "INSERT INTO hwnotebookdell VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio')";
					   $update_vigencia = "update hwnotebookdell SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
			    	    $update_aquisicao = "update hwnotebookdell SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";				   
					    break;

					    case "notebooks":
					     $query = "INSERT INTO hwnotebooknormal VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio')";
						  $update_vigencia = "update hwnotebooknormal SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
						   $update_aquisicao = "update hwnotebooknormal SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";				   
						  break;

						  case "rede":
							$query = "INSERT INTO hwrede VALUES ('$localizacao','$nome','$fabricante','$modelo','$servicetag','$tipo','$aquisicao_rede', '$idade_rede', '$ipwan','$iplan','$dhcp','$mascara','$patrimonio_rede')";
							$update_aquisicao = "update hwrede SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
							$update_vigencia = null;
							break;
							 
							 case "nobreaks":
								$query = "INSERT INTO hwnobreaks VALUES ('$localizacao','$nome','$fabricante','$modelo','$servicetag','$capacidade','$batInterna','$batExterna','$tensao','$peso','$aquisicao_nobreak','$idade_nobreak','$trocaBat','$patrimonio_nb')";
								$update_aquisicao = "update hwnobreaks SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
								$update_vigencia = null;
								break;

						   
		
		}
			$execQuery = $import->conectar->prepare($query);
			$execUpdateVigencia = $import->conectar->prepare($update_vigencia);
			$execUpdateAquisicao = $import->conectar->prepare($update_aquisicao);
			
			// Verifica se algum das Query's retornou erro
			if($execQuery->execute() === false){
				echo "<pre>";
				print_r($execQuery->errorInfo());
				$checkFail = 1;

			}else {
				$execQuery = null;
				$query = null;
				$update_aquisicao = null;
				$update_vigencia = null;
			}

			// Verifica se o Update em Vigencia retornou erro
			if($update_vigencia <> null){
			if($execUpdateVigencia->execute() === false){
				echo "<pre>";
				print_r($execQuery->errorInfo());
				$checkFail = 1;

			}else {
				$execQuery = null;
				$query = null;
				$update_aquisicao = null;
				$update_vigencia = null;
			}
		}

			// Verifica se o Update em Aquisicao retornou erro
			if($execUpdateAquisicao->execute() === false){
				echo "<pre>";
				print_r($execQuery->errorInfo());
				$checkFail = 1;

			}else {
				$execQuery = null;
				$query = null;
				$update_aquisicao = null;
				$update_vigencia = null;
			}



			// Mensagem de Erro referente a Query
			if($checkFail){

				echo "ERRO - Query DB".PHP_EOL;

			} 

			$primeira_linha = false;

		}

			


			
			

		


	

	}
?>



<body onload='window.history.back();'>
