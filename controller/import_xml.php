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
				$localizacao = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$nome = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$fabricante = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$modelo = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$servicetag = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$uuid = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$processador = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$memoria = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$disco = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$aquisicao = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);
				$idade = addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue);
				$suporte = addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue);
				$vigencia = addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue);
				$sistemaoperacional = addslashes($linha->getElementsByTagName("Data")->item(13)->nodeValue);
				$office = addslashes($linha->getElementsByTagName("Data")->item(14)->nodeValue);
				$patrimonio = addslashes($linha->getElementsByTagName("Data")->item(15)->nodeValue);
				
				// Colect Específico - Rede
				$tipo = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$aquisicao_rede = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$idade_rede = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$ipwan = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$iplan = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);
				$dhcp = addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue);
				$mascara = addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue);
				$patrimonio_rede = addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue);

				//Colect Específico - Nobreaks

				$capacidade = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$batInterna = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$batExterna = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$tensao = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$peso = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);
				$aquisicao_nobreak = addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue);
				$idade_nobreak = addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue);
				$trocaBat = addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue);
				$patrimonio_nb = addslashes($linha->getElementsByTagName("Data")->item(13)->nodeValue);

				//Colect Específico - GMG
				$potencia = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$corrente = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$tagGMG = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$motor = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$gerador = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$comando = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$pesoGMG = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);
				$aquisicaoGMG = addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue);
				$idadeGMG = addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue);
				$patrimonioGMG = addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue);

				//Específico - Link de Voz

				$localizacaoVoz = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$nomeVoz = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$operadoraVoz = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$tipoVoz = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$circuitoVoz = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$pilotoVoz = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$ddrVoz = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$patrimonioVoz = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);

				// Específico - Link de Dados
				$localizacaoLink = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$nomeLink = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$operadoraLink = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$tipoLink = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$capacidadeLink = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$circuitoLink = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$ipwanLink = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$gatewayLink = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$redelanLink = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$mascaraLink = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);
				$hardwareLink = addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue);
				$enderecoLink = addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue);
				$mensalidadeLink = addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue);
				$patrimonioLink = addslashes($linha->getElementsByTagName("Data")->item(13)->nodeValue);

				// Específico - Servidores
				$localizacaoServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue));
				$nomeServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue));
				$fabricanteServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue));
				$modeloServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue));
				$servicetagServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue));
				$processadorServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue));
				$memoriaServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue));
				$discoServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue));
				$pesoServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue));
				$consumoServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue));
				$aquisicaoServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue));
				$idadeServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue));
				$sistemaoperacionalServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue));
				$ipServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(13)->nodeValue));
				$patrimonioServidor = strip_tags(addslashes($linha->getElementsByTagName("Data")->item(14)->nodeValue));

				// Específico - Impressoras
				$localizacaoPrinter = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$nomePrinter = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$fabricantePrinter = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$modeloPrinter = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$servicetagPrinter = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$tipoPrinter = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$aquisicaoPrinter = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$idadePrinter = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$iplanPrinter = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$patrimonioPrinter = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);

				// Específico - CFTV
				$localizacaoCFTV = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$fabricanteCFTV = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$modeloCFTV = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$servicetagCFTV = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$tipoCFTV = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$aquisicaoCFTV = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$idadeCFTV = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$patrimonioCFTV = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);

				//Específico - Ares
				$localizacaoAr = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$nomeAr = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$fabricanteAr = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$modeloAr = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$potenciaAr = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$aquisicaoAr = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$idadeAr = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$patrimonioAr = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);

				//Específico - Projetores
				$localizacaoProjetor = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$fabricanteProjetor = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$modeloProjetor = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$servicetagProjetor = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$aquisicaoProjetor = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$idadeProjetor = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$patrimonioProjetor = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);

				//Específico - HD Externo
				$localizacaoHD = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$fabricanteHD = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$modeloHD = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$servicetagHD = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$discoHD = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$aquisicaoHD = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$patrimonioHD = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);

				//Específico - Porteiro Eletrônico
				$localizacaoPorteiro = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$fabricantePorteiro = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$modeloPorteiro =addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$servicetagPorteiro = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$telaPorteiro = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$aquisicaoPorteiro = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$patrimonioPorteiro = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);

				//Específico - Tablets
				$localizacaoTablet = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$usuarioTablet = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$saidaTablet = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$entradaTablet = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$fabricanteTablet = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$modeloTablet = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$servicetagTablet = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$imeiTablet = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$processadorTablet = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$memoriaTablet = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);
				$discoTablet = addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue);
				$telaTablet = addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue);
				$sistemaTablet = addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue);
				$aquisicaoTablet = addslashes($linha->getElementsByTagName("Data")->item(13)->nodeValue);
				$patrimonioTablet = addslashes($linha->getElementsByTagName("Data")->item(14)->nodeValue);
				$simcardTablet = addslashes($linha->getElementsByTagName("Data")->item(15)->nodeValue);

				//Específico - Smartphones
				$localizacaoSM = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$usuarioSM = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$saidaSM = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$entradaSM = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$fabricanteSM = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$modeloSM = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$servicetagSM = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);
				$imeiSM = addslashes($linha->getElementsByTagName("Data")->item(7)->nodeValue);
				$imeidoisSM = addslashes($linha->getElementsByTagName("Data")->item(8)->nodeValue);
				$processadorSM = addslashes($linha->getElementsByTagName("Data")->item(9)->nodeValue);
				$memoriaSM = addslashes($linha->getElementsByTagName("Data")->item(10)->nodeValue);
				$discoSM = addslashes($linha->getElementsByTagName("Data")->item(11)->nodeValue);
				$telaSM = addslashes($linha->getElementsByTagName("Data")->item(12)->nodeValue);
				$sistemaSM = addslashes($linha->getElementsByTagName("Data")->item(13)->nodeValue);
				$aquisicaoSM = addslashes($linha->getElementsByTagName("Data")->item(14)->nodeValue);
				$patrimonioSM = addslashes($linha->getElementsByTagName("Data")->item(15)->nodeValue);

				//Específico - PIN's
				$localizacaoPIN = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$nomePIN = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$pin = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$uuidPIN = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$servicetagPIN = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$patrimonioPIN = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);

				//Específico - Softwares
				$patrimonioSW = addslashes($linha->getElementsByTagName("Data")->item(0)->nodeValue);
				$localizacaoSW = addslashes($linha->getElementsByTagName("Data")->item(1)->nodeValue);
				$usuarioSW = addslashes($linha->getElementsByTagName("Data")->item(2)->nodeValue);
				$versaoSW = addslashes($linha->getElementsByTagName("Data")->item(3)->nodeValue);
				$chaveSW = addslashes($linha->getElementsByTagName("Data")->item(4)->nodeValue);
				$duracaoSW = addslashes($linha->getElementsByTagName("Data")->item(5)->nodeValue);
				$observacaoSW = addslashes($linha->getElementsByTagName("Data")->item(6)->nodeValue);

			}

			
			// Query e prepare da Query, execução será dentro do IF que verifica se a Query retornou erro também...
			switch($operacao){
			

			// Query e Updates referentes aos computadores em gerais
			// Cada tipo de computaddor é armazenado em uma tabela diferente, Desktop, Desktop Dell, Notebook, Notebook Dell, etc

			//Desktop's Dell
			 case "dell":
			  $query = "INSERT INTO hwdesktop VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio',NULL)";
			   $update_vigencia = "update hwdesktop SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
				$update_aquisicao = "update hwdesktop SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
				$camposBranco = "DELETE FROM hwdesktop WHERE patrimonio = ''";
			   break;
				
			   // Outros Desktop's
				case "variados":
					$query = "INSERT INTO hwdesktopnormal VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio',NULL)";
					 $update_vigencia = "UPDATE hwdesktopnormal SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
					  $update_aquisicao = "UPDATE hwdesktopnormal SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
					  $camposBranco = "DELETE FROM hwdesktopnormal WHERE patrimonio = ''";
					break;

					// Notebook's Dell
					case "notedell":
					  $query = "INSERT INTO hwnotebookdell VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio',NULL)";
					   $update_vigencia = "UPDATE hwnotebookdell SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
						$update_aquisicao = "UPDATE hwnotebookdell SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
						$camposBranco = "DELETE FROM hwnotebookdell WHERE patrimonio = ''";			   
					    break;

						// Outros Notebook's
					    case "notebooks":
					     $query = "INSERT INTO hwnotebooknormal VALUES('$localizacao','$nome','$fabricante', '$modelo', '$servicetag', '$uuid', '$processador', '$memoria', '$disco', '$aquisicao', '$idade', '$suporte', '$vigencia', '$sistemaoperacional', '$office', '$patrimonio',NULL)";
						  $update_vigencia = "UPDATE hwnotebooknormal SET vigencia = REPLACE(vigencia, 'T00:00:00.', '')";
						   $update_aquisicao = "UPDATE hwnotebooknormal SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
						   $camposBranco = "DELETE FROM hwnotebooknormal WHERE patrimonio = ''";				   
						  break;

						  // Rede
						  case "rede":
							$query = "INSERT INTO hwrede VALUES ('$localizacao','$nome','$fabricante','$modelo','$servicetag','$tipo','$aquisicao_rede', '$idade_rede', '$ipwan','$iplan','$dhcp','$mascara','$patrimonio_rede',NULL)";
							$update_aquisicao = "UPDATE hwrede SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
							$update_vigencia = null;
							$camposBranco = "DELETE FROM hwrede WHERE patrimonio =  ''";
							break;
							 
							// Nobreaks
							 case "nobreaks":
								$query = "INSERT INTO hwnobreaks VALUES ('$localizacao','$nome','$fabricante','$modelo','$servicetag','$capacidade','$batInterna','$batExterna','$tensao','$peso','$aquisicao_nobreak','$idade_nobreak','$trocaBat','$patrimonio_nb',NULL)";
								$update_aquisicao = "UPDATE hwnobreaks SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
								$update_vigencia = null;
								$camposBranco = "DELETE FROM hwnobreaks WHERE patrimonio = ''";
								break;

								// Gerador
								case "gmg":
									$query = "INSERT INTO hwgmg VALUES('$localizacao','$nome','$fabricante','$potencia','$corrente','$tagGMG','$motor','$gerador','$comando','$pesoGMG','$aquisicaoGMG','$idadeGMG','$patrimonioGMG',NULL)";
									$update_aquisicao = "UPDATE hwgmg SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
									$update_vigencia = null;
									$camposBranco = "DELETE  FROM hwgmg WHERE patrimonio = ''";
									break;

									// Link de Voz
									case "voz":
										$query = "INSERT INTO hwvoz VALUES('$localizacaoVoz','$nomeVoz','$operadoraVoz','$tipoVoz','$circuitoVoz','$pilotoVoz','$ddrVoz','$patrimonioVoz',NULL)";
										$update_aquisicao = null;
										$update_vigencia = null;
										$camposBranco = "DELETE FROM hwvoz WHERE patrimonio = ''";
										break;

										// Link de Dados
										case "dados":
											$query = "INSERT INTO hwlink VALUES('$localizacaoLink','$nomeLink','$operadoraLink','$tipoLink','$capacidadeLink','$circuitoLink','$ipwanLink','$gatewayLink','$redelanLink','$mascaraLink','$hardwareLink','$enderecoLink','$mensalidadeLink','$patrimonioLink',NULL)";
											$update_aquisicao = null;
											$update_vigencia = null;
											$camposBranco = "DELETE FROM hwlink WHERE patrimonio = ''";
											break;

											// Servidores
											case "servidores":
												$query = "INSERT INTO hwservidores (`localizacao`,`nome`,`fabricante`,`modelo`,`servicetag`,`processador`,`memoria`,`disco`,`peso`,`consumo`,`aquisicao`,`idade`,`sistemaoperacional`,`ip`,`patrimonio`,`id`) VALUES('$localizacaoServidor','$nomeServidor','$fabricanteServidor', '$modeloServidor', '$servicetagServidor', '$processadorServidor', '$memoriaServidor', '$discoServidor', '$pesoServidor', '$consumoServidor', '$aquisicaoServidor', '$idadeServidor', '$sistemaoperacionalServidor', '$ipServidor', '$patrimonioServidor',NULL)";		
												$update_vigencia =  null;
												$update_aquisicao = "UPDATE hwservidores SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";
												$camposBranco = "DELETE FROM hwservidores WHERE patrimonio = ''";
												break;

												// Impressoras
												case "impressoras":
													$query = "INSERT INTO hwimpressoras VALUES ('$localizacaoPrinter','$nomePrinter','$fabricantePrinter','$modeloPrinter','$servicetagPrinter','$tipoPrinter','$aquisicaoPrinter','$idadePrinter','$iplanPrinter','$patrimonioPrinter',NULL)";
													$update_aquisicao = "UPDATE hwimpressoras SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
													$update_vigencia = null;
													$camposBranco = "DELETE FROM hwimpressoras WHERE patrimonio =  ''";
													break;

													// CFTV
													case "cftv":
														$query = "INSERT INTO hwcftv VALUES(NULL,'$localizacaoCFTV','$fabricanteCFTV','$modeloCFTV','$servicetagCFTV','$tipoCFTV','$aquisicaoCFTV','$idadeCFTV','$patrimonioCFTV')";
														$update_aquisicao = "UPDATE hwcftv SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
														$update_vigencia = null;
														$camposBranco = "DELETE FROM hwcftv WHERE patrimonio =  ''";
														break;

														// Ares
														case "ares":
															$query = "INSERT INTO hwares VALUES(NULL,'$localizacaoAr', '$nomeAr', '$fabricanteAr', '$modeloAr', '$potenciaAr', '$aquisicaoAr', '$idadeAr', '$patrimonioAr')";
														    $update_aquisicao = "UPDATE hwares SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
														    $update_vigencia = null;
														    $camposBranco = "DELETE FROM hwares WHERE patrimonio =  ''";
															break;

															// Projetores
															case "projetores":
															$query = "INSERT INTO hwprojetores VALUES(NULL,'$localizacaoProjetor', '$fabricanteProjetor', '$modeloProjetor', '$servicetagProjetor', '$aquisicaoProjetor', '$idadeProjetor', '$patrimonioProjetor')";
															$update_aquisicao = "UPDATE hwprojetores SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
														    $update_vigencia = null;
														    $camposBranco = "DELETE FROM hwprojetores WHERE patrimonio =  ''";
															break;
															
															// HD Externo
															case "hds":
																$query = "INSERT INTO hwhdexterno VALUES(NULL,'$localizacaoHD','$fabricanteHD','$modeloHD','$servicetagHD','$discoHD','$aquisicaoHD','$patrimonioHD')";
																$update_aquisicao = "UPDATE hwhdexterno SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
														    	$update_vigencia = null;
														    	$camposBranco = "DELETE FROM hwhdexterno WHERE patrimonio =  ''";
																break;

																// Porteiro Eletrônico
																case "peletronico":
																	$query = "INSERT INTO hwporteiro VALUES(NULL, '$localizacaoPorteiro','$fabricantePorteiro','$modeloPorteiro','$servicetagPorteiro','$telaPorteiro','$aquisicaoPorteiro','$patrimonioPorteiro')";
																	$update_aquisicao = "UPDATE hwporteiro SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
														    		$update_vigencia = null;
														    		$camposBranco = "DELETE FROM hwporteiro WHERE patrimonio =  ''";
																	break;

																	// Tablets
																	case "tablets":
																		$query = "INSERT INTO hwtablets VALUES(NULL, '$localizacaoTablet','$usuarioTablet','$saidaTablet','$entradaTablet','$fabricanteTablet','$modeloTablet','$servicetagTablet','$imeiTablet','$processadorTablet','$memoriaTablet','$discoTablet','$telaTablet','$sistemaTablet','$aquisicaoTablet','$patrimonioTablet','$simcardTablet')";
																		$update_aquisicao = "UPDATE hwtablets SET aquisicao = REPLACE(aquisicao, 'T00:00:00.', '')";	
														    			$update_vigencia = null;
														    			$camposBranco = "DELETE FROM hwtablets WHERE patrimonio =  ''";
																		break;

																		// Smartphones
																		case "smartphones":
																			$query = "INSERT INTO hwsmartphones VALUES(NULL, '$localizacaoSM', '$usuarioSM', '$saidaSM', '$entradaSM', '$fabricanteSM', '$modeloSM', '$servicetagSM', '$imeiSM', '$imeidoisSM', '$processadorSM', '$memoriaSM', '$discoSM', '$telaSM', '$sistemaSM', '$aquisicaoSM', '$patrimonioSM')";
																			$update_aquisicao = null;
																			$update_vigencia = null;
														    				$camposBranco = "DELETE FROM hwsmartphones WHERE patrimonio =  ''";
																			break;

																		// PIN's
																		case "pin":
																			$query = "INSERT INTO hwpin VALUES(NULL, '$localizacaoPIN', '$nomePIN', '$pin', '$uuidPIN', '$servicetagPIN','$patrimonioPIN')";
																			$update_aquisicao = null;	
														    				$update_vigencia = null;
														    				$camposBranco = "DELETE FROM hwpin WHERE patrimonio =  ''";
																			break;

																			// Softwares
																			case "softwares":
																				$query = "INSERT INTO softwares VALUES(NULL, '$localizacaoSW', '$versaoSW', '$chaveSW', '$usuarioSW', '$observacaoSW', '$duracaoSW', '$patrimonioSW')";
																				$update_aquisicao = null;	
																				$update_vigencia = null;
																				$camposBranco = "DELETE FROM softwares WHERE patrimonio =  ''";
																				break;
													



		
		}



			$execQuery = $import->conectar->prepare($query);
			$execUpdateVigencia = $import->conectar->prepare($update_vigencia);
			$execUpdateAquisicao = $import->conectar->prepare($update_aquisicao);
			$execCampos = $import->conectar->prepare($camposBranco);
			
			// Verifica se algum das Query's retornou erro
			if($execQuery->execute() === false){
				echo "<pre>";
				print_r($execQuery->errorInfo());
				print_r($php_errormsg);
				$checkFail = 1;

			}else {
				// Mata todas as instâncias apos a execução
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
				print_r($php_errormsg);
				$checkFail = 1;

			}else {
				// Mata todas as instâncias apos a execução
				$execUpdateVigencia = null;
				$query = null;
				$update_aquisicao = null;
				$update_vigencia = null;
			}
		}

			// Verifica se o Update em Aquisicao retornou erro
			if($update_aquisicao <> null){
				if($execUpdateAquisicao->execute() === false){
					echo "<pre>";
					print_r($execQuery->errorInfo());
					print_r($php_errormsg);
					$checkFail = 1;
	
				}else {
					// Mata todas as instâncias apos a execução
					$execUpdateAquisicao = null;
					$query = null;
					$update_aquisicao = null;
					$update_vigencia = null;
				}
			}
			

			// Verifica se o delete de campos em branco retornou erro

			if($camposBranco <> null){
				if($execCampos->execute() === false){

					echo "<pre>";
					print_r($execCampos->errorInfo());
					print_r($php_errormsg);
					$checkFail = 1;
	
				} else {
					// Mata todas as instâncias apos a execução
					$execCampos = null;
					$query = null;
					$update_aquisicao = null;
					$update_vigencia = null;
				}

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
