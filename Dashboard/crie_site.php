<?php
session_start();

function db_connect() {
    $host = 'localhost';
    $db   = 'comercial';
    $user = 'tacweb';  // Usuário do banco
    $pass = 'nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237';      // Senha do banco

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    return $conn;
}

// Inserir dados no perfil
if (isset($_POST['salvar'])) {
    // Conexão com o banco de dados
    $conn = db_connect();

    // Preparar e vincular a instrução
    $stmt = $conn->prepare("INSERT INTO perfil (nome_empresa, email, telefone, endereco, sobre, Datacriacao, missao, estrategia, anosexperiencia, totaldeclientes, totaldeprojectos, logotipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $nome_empresa, $email, $telefone, $endereco, $sobre, $Datacriacao, $missao, $estrategia, $anosexperiencia, $totaldeclientes, $totaldeprojectos, $logotipo_path);

    // Coletando dados do formulário
    $nome_empresa = $_POST['nome_empresa'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $sobre = $_POST['sobre'] ?? '';
    $Datacriacao = $_POST['Datacriacao'] ?? '';
    $missao = $_POST['missao'] ?? '';
    $estrategia = $_POST['estrategia'] ?? '';
    $anosexperiencia = $_POST['anosexperiencia'] ?? '';
    $totaldeclientes = $_POST['totaldeclientes'] ?? '';
    $totaldeprojectos = $_POST['totaldeprojectos'] ?? '';
    $logotipo_path = $_POST['logotipo'] ?? ''; // Certifique-se de que o campo 'logotipo' está presente
    

    // Ligando parâmetros
    

    // Tratamento do upload de logotipo
    if (isset($_FILES['logotipo']) && $_FILES['logotipo']['error'] === UPLOAD_ERR_OK) {
        $logotipo_tmp = $_FILES['logotipo']['tmp_name'];
        $logotipo_name = basename($_FILES['logotipo']['name']);
        $logotipo_path = 'uploads/' . $logotipo_name;

        // Mover o arquivo para a pasta "uploads"
        if (move_uploaded_file($logotipo_tmp, $logotipo_path)) {
            // Executar a instrução preparada
            if ($stmt->execute()) {
                echo "Registro salvo com sucesso.";
                header('Location: perfil.php');
            } else {
                echo "Erro ao salvar registro: " . $stmt->error;
            }
        } else {
            echo "Falha no upload do arquivo.";
        }
    } else {
        echo "Erro no upload do arquivo.";
    }

    // Fechar conexões
    $stmt->close();
    $conn->close();
}

// Inserir dados de redes e computação
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['salvarredesecomputacao'])) {
    $conn = db_connect();

    // Coletando dados do formulário
    $solucoesredes = $conn->real_escape_string($_POST['solucoesredes']);
    $computacaoredes = $conn->real_escape_string($_POST['computacaoredes']);
    $segurancaredes = $conn->real_escape_string($_POST['segurancaredes']);

    // Query para inserir os dados no banco
    $sql = "INSERT INTO redescomputacao (solucoes, servicos_computacao, seguranca_cibernetica) 
            VALUES ('$solucoesredes', '$computacaoredes', '$segurancaredes')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados armazenados com sucesso!";
    } else {
        echo "Erro ao armazenar os dados: " . $conn->error;
    }

  
}



if (isset($_POST['salvardadosdatacenter'])) {
    $conn = db_connect();

    // Verifica se os campos estão definidos e se não estão vazios
    $infrastructure = $conn->real_escape_string($_POST['infrastructure']);
    $security = $conn->real_escape_string($_POST['security']);
    $reliability = $conn->real_escape_string($_POST['reliability']);
    $cost_reduction = $conn->real_escape_string($_POST['cost-reduction']);
    $support = $conn->real_escape_string($_POST['support']);
    $compliance = $conn->real_escape_string($_POST['compliance']);
    $innovation = $conn->real_escape_string($_POST['innovation']);

    // Insere os dados na tabela
    $sql = "INSERT INTO datacenter (infrastructure, security, reliability, cost_reduction, support, compliance, innovation)
            VALUES ('$infrastructure', '$security', '$reliability', '$cost_reduction', '$support', '$compliance', '$innovation')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

}




if (isset($_POST['salvardadosaplicacoes'])) {
    // Conexão com o banco de dados
    $conn = db_connect();

    // Recupera e limpa os dados do formulário
    $solucoes_personalizadas = $conn->real_escape_string($_POST['solucoes-personalizadas']);
    $integracao_sistemas = $conn->real_escape_string($_POST['integracao-sistemas']);
    $seguranca_confiabilidade = $conn->real_escape_string($_POST['seguranca-confiabilidade']);
    $automatizacao_processos = $conn->real_escape_string($_POST['automatizacao-processos']);
    $suporte_tecnico = $conn->real_escape_string($_POST['suporte-tecnico']);
    $inovacao = $conn->real_escape_string($_POST['inovacao']);

    // Query para inserir os dados na tabela aplicacoesesistemas
    $sql = "INSERT INTO aplicacoesesistemas (solucoes_personalizadas, integracao_sistemas, seguranca_confiabilidade, automatizacao_processos, suporte_tecnico, inovacao)
            VALUES ('$solucoes_personalizadas', '$integracao_sistemas', '$seguranca_confiabilidade', '$automatizacao_processos', '$suporte_tecnico', '$inovacao')";

    // Executa a query e verifica se foi inserido corretamente
    if ($conn->query($sql) === TRUE) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }
}



if (isset($_POST['salvardadossocnoc'])) {
    // Conexão com o banco de dados
    $conn = db_connect();

    // Recupera e limpa os dados do formulário
    $soc_protecao = $conn->real_escape_string($_POST['soc-protecao']);
    $vantagens_soc = $conn->real_escape_string($_POST['vantagens-soc']);
    $noc_desempenho = $conn->real_escape_string($_POST['noc-desempenho']);
    $vantagens_noc = $conn->real_escape_string($_POST['vantagens-noc']);
    $escolher_tac = $conn->real_escape_string($_POST['escolher-tac']);

    // Query para inserir os dados na tabela socnoc
    $sql = "INSERT INTO socnoc (soc_protecao, vantagens_soc, noc_desempenho, vantagens_noc, escolher_tac)
            VALUES ('$soc_protecao', '$vantagens_soc', '$noc_desempenho', '$vantagens_noc', '$escolher_tac')";

    // Executa a query e verifica se foi inserido corretamente
    if ($conn->query($sql) === TRUE) {
        echo "Dados do SOC e NOC salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }
}




if (isset($_POST['salvardadosservicos'])) {
    // Conexão com o banco de dados
    $conn = db_connect();

    // Recupera e limpa os dados do formulário
    $servicos_geridos = $conn->real_escape_string($_POST['servicos-geridos']);
    $iaas = $conn->real_escape_string($_POST['iaas']);
    $iot_xaas = $conn->real_escape_string($_POST['iot-xaas']);
    $vantagens_tac = $conn->real_escape_string($_POST['vantagens-tac']);

    // Query para inserir os dados na tabela servicos
    $sql = "INSERT INTO servicos (servicos_geridos, iaas, iot_xaas, vantagens_tac)
            VALUES ('$servicos_geridos', '$iaas', '$iot_xaas', '$vantagens_tac')";

    // Executa a query e verifica se foi inserido corretamente
    if ($conn->query($sql) === TRUE) {
        echo "Dados dos Serviços Geridos, IaaS e IoT > XaaS salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }
}



if (isset($_POST['salvardadossustentabilidade'])) {
    // Conexão com o banco de dados
    $conn = db_connect();

    // Recupera e limpa os dados do formulário
    $infraestruturas_eficientes = $conn->real_escape_string($_POST['infraestruturas-eficientes']);
    $redes_resilientes = $conn->real_escape_string($_POST['redes-resilientes']);
    $desenvolvimento_agil = $conn->real_escape_string($_POST['desenvolvimento-agil']);
    $automacao_ia = $conn->real_escape_string($_POST['automacao-ia']);

    // Query para inserir os dados na tabela sustentabilidade
    $sql = "INSERT INTO sustentabilidade (infraestruturas_eficientes, redes_resilientes, desenvolvimento_agil, automacao_ia)
            VALUES ('$infraestruturas_eficientes', '$redes_resilientes', '$desenvolvimento_agil', '$automacao_ia')";

    // Executa a query e verifica se foi inserido corretamente
    if ($conn->query($sql) === TRUE) {
        echo "Dados de Sustentabilidade salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }
}




if (isset($_POST['salvardadosegurancacibernetica'])) {
    // Conexão com o banco de dados
    $conn = db_connect();

    // Recupera e limpa os dados do formulário
    $monitoramento_proativo = $conn->real_escape_string($_POST['monitoramento-proativo']);
    $resposta_incidentes = $conn->real_escape_string($_POST['resposta-incidentes']);
    $defesa_camadas = $conn->real_escape_string($_POST['defesa-camadas']);
    $treinamento_funcionarios = $conn->real_escape_string($_POST['treinamento-funcionarios']);
    $auditorias_conformidade = $conn->real_escape_string($_POST['auditorias-conformidade']);

    // Query para inserir os dados na tabela ataques_cibernetico
    $sql = "INSERT INTO ataques_cibernetico (monitoramento_proativo, resposta_incidentes, defesa_camadas, treinamento_funcionarios, auditorias_conformidade)
            VALUES ('$monitoramento_proativo', '$resposta_incidentes', '$defesa_camadas', '$treinamento_funcionarios', '$auditorias_conformidade')";

    // Executa a query e verifica se foi inserido corretamente
    if ($conn->query($sql) === TRUE) {
        echo "Dados de ataques cibernéticos salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }
}
















include "cabecalho.php";

?>

<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<!--**********************************
            Sidebar start
        ***********************************-->
<?php
include "menu.php";
?>
<!--**********************************
            Sidebar end
        ***********************************-->

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Formulários
                <li class="breadcrumb-item active"> Criar Site</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <!-- Primeira Seção: Informações da Empresa -->
                <details class="col-lg-12">
                    <summary style="font-size: 20px;">Dados Iniciais</summary>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">CRIE AGORA SEU SITE</h4>
                                <p class="text-muted m-b-15 f-s-12">Adapte agora os dados da sua empresa no seu site,
                                    preenchendo os campos conforme o requerido</p>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <input type="text" name="nome_empresa" class="form-control input-default"
                                            placeholder="Nome da Empresa" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="tel" name="telefone" class="form-control"
                                                placeholder="Telefone" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="endereco" class="form-control"
                                            placeholder="País/Prov/cidade">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </details>

                <!-- Segunda Seção: Sobre a Empresa -->
                <details class="col-lg-12">
                    <summary style="font-size: 20px;">Sobre sua Empresa</summary>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sobre</h4>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label>Fale sobre sua empresa:</label>
                                        <textarea name="sobre" class="form-control h-150px" rows="6"
                                            required>Uma empresa de Projectos e de Integração de Soluções de Audiovisuais, Domótica, Redes integradas de voz, dados e segurança.</textarea>
                                        <br>
                                        <label for="Datacriacao">Quem somos:</label>
                                        <textarea name="Datacriacao" class="form-control h-150px" rows="6"
                                            required>A The Audiovisual Company, S.A. é uma empresa LÍDER no mercado português na Área de  Projectos e de Integração de Soluções de Audiovisuais, Domótica, Segurança e Redes.</textarea>
                                        <br>
                                        <label for="missao">Missão:</label>
                                        <textarea name="missao" class="form-control h-150px" rows="6"
                                            required>A nossa Missão é proporcionar soluções inovadoras, personalizadas e de excelência na área dos audiovisuais, comunicação e segurança dos equipamentos.</textarea>
                                        <br>
                                        <label for="estrategia">Estratégia:</label>
                                        <textarea name="estrategia" class="form-control h-150px" rows="6"
                                            required>A TAC tem como estratégia projectar, conceber e instalar complexos sistemas que integram comunicação e/ou segurança com meios de exposição visual.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </details>

                <!-- Terceira Seção: Anos de Experiência e Totais -->
                <details class="col-lg-12">
                    <summary style="font-size: 20px;">Tempos</summary>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Anos de Experiência</h4>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <input type="number" name="anosexperiencia" class="form-control"
                                            placeholder="Anos de experiência" required>
                                    </div>
                                    <h4 class="card-title">Total de Clientes</h4>
                                    <div class="form-group">
                                        <input type="number" name="totaldeclientes" class="form-control"
                                            placeholder="Total de clientes" required>
                                    </div>
                                    <h4 class="card-title">Total de Projetos Feitos</h4>
                                    <div class="form-group">
                                        <input type="number" name="totaldeprojectos" class="form-control"
                                            placeholder="Total de projetos feitos" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </details>
                <!-- Quarta Seção: Upload do Logotipo -->
                <details class="col-lg-12">
                    <summary style="font-size: 20px;">Logotipo</summary>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Logotipo</h4>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <input type="file" name="logotipo" class="form-control-file" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </details>

                <!-- Botões de Ação -->
                <details class="col-lg-12">
                    <summary style="font-size: 20px;">Acções</summary>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <input type="submit" class="btn btn-dark" name="salvar" value="Salvar">
                                    <input type="reset" class="btn btn-danger" value="Limpar">
                                </div>
                            </div>
                        </div>
                    </div>
                </details>
            </div>

    </form>

    <details class="col-lg-12">
        <summary style="font-size: 20px;">Conteúdo de Redes & Computação</summary>
        <!-- Formulário de Serviços de Redes e Computação -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <h1 class="card-title">Serviços de Redes & Computação</h1>
                            <div class="form-group">
                                <label for="solucoesredes">Soluções:</label>
                                <textarea name="solucoesredes" class="form-control h-150px" rows="6"
                                    required>No mundo atual, onde a conectividade é essencial para o sucesso de qualquer organização, redes sólidas e seguras desempenham um papel crucial. A TAC oferece soluções completas de infraestrutura de redes, tanto físicas quanto virtuais, garantindo que os dados fluam de maneira rápida, eficiente e segura entre os sistemas de sua empresa.

Desde a instalação de redes estruturadas até a configuração de roteadores, switches e servidores, a TAC assegura que sua rede atenda às demandas de conectividade, escalabilidade e performance. A empresa também se destaca pela implementação de protocolos de segurança de redes, essenciais para proteger contra ameaças externas e garantir que dados confidenciais não sejam comprometidos.

Segurança de redes vai além da proteção básica de firewall. A TAC utiliza uma combinação de firewalls avançados, VPNs seguras, segmentação de rede e sistemas de detecção de intrusões (IDS) para proteger contra ataques e garantir a integridade dos dados. Oferecemos também monitoramento constante e planos de resposta a incidentes, para que sua empresa esteja sempre preparada para lidar com qualquer ameaça à segurança digital.</textarea>
                                <br>
                                <label for="computacaoredes">Serviços de Computação:</label>
                                <textarea name="computacaoredes" class="form-control h-150px" rows="6"
                                    required>Além de redes, a TAC oferece um amplo portfólio de serviços de computação, cobrindo desde a manutenção de hardware até o desenvolvimento de sistemas customizados. Nosso objetivo é garantir que as operações de sua empresa fluam sem interrupções, com infraestruturas de TI otimizadas e de alto desempenho.

Trabalhamos com a manutenção preventiva e corretiva de computadores e servidores, garantindo que seus equipamentos estejam sempre funcionando no máximo de sua capacidade. Oferecemos também soluções de virtualização, permitindo que múltiplos sistemas operacionais rodem em um único hardware, otimizando o uso de recursos e reduzindo custos.

A computação em nuvem é outra área em que a TAC se destaca, oferecendo migração de sistemas para a nuvem, hospedagem segura e gestão de dados em servidores remotos. Essa abordagem permite maior flexibilidade, escalabilidade e segurança no armazenamento e no acesso às informações da sua empresa.

Além disso, a TAC desenvolve sistemas e softwares sob medida, adaptados às necessidades específicas do seu negócio. Nossa equipe de especialistas é capaz de criar soluções que integram suas operações, otimizam processos e garantem uma gestão mais eficiente dos recursos tecnológicos.</textarea>
                                <br>
                                <label for="segurancaredes">Segurança Cibernética:</label>
                                <textarea name="segurancaredes" class="form-control h-150px" rows="6"
                                    required>A TAC oferece soluções de segurança cibernética para proteger dados sensíveis e sistemas críticos, como firewalls e backups automáticos.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <input type="submit" class="btn btn-dark" name="salvarredesecomputacao"
                                    value="Salvar Conteúdo de Redes e Computação">
                                <input type="reset" class="btn btn-danger" value="Limpar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </details>











    <details class="col-lg-12">
        <summary style="font-size: 20px;">Conteúdo de Datacenter</summary>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <h1 class="card-title">Serviços de DATACENTER</h1>

                            <!-- Infraestrutura Robusta e Escalável -->
                            <div class="form-group">
                                <label for="infrastructure">Infraestrutura Robusta e Escalável</label>
                                <textarea id="infrastructure" name="infrastructure" class="form-control h-150px"
                                    rows="6">
Com os serviços de datacenter da TAC, sua empresa se beneficia de uma infraestrutura tecnológica avançada. Nossos datacenters são projetados para suportar uma grande quantidade de dados e tráfego, oferecendo uma base sólida para o crescimento. Se sua empresa precisa expandir sua capacidade de armazenamento ou aumentar o processamento de dados, nossa infraestrutura escalável permite que você faça isso sem a necessidade de investir em hardware adicional.
                </textarea>
                            </div>

                            <!-- Segurança de Dados de Nível Superior -->
                            <div class="form-group">
                                <label for="security">Segurança de Dados de Nível Superior</label>
                                <textarea id="security" name="security" class="form-control h-150px" rows="6">
A segurança é uma prioridade máxima para qualquer empresa, e nossos datacenters são equipados com tecnologia de ponta para garantir a proteção dos seus dados. Desde controles de acesso físicos rigorosos até sistemas de segurança cibernética avançados, protegemos suas informações contra ameaças internas e externas. Além disso, realizamos backups regulares e testes de recuperação para garantir que seus dados estejam sempre seguros e disponíveis.
                </textarea>
                            </div>

                            <!-- Confiabilidade e Disponibilidade -->
                            <div class="form-group">
                                <label for="reliability">Confiabilidade e Disponibilidade</label>
                                <textarea id="reliability" name="reliability" class="form-control h-150px" rows="6">
Os serviços de datacenter da TAC são projetados para garantir a máxima disponibilidade e uptime. Nossos datacenters utilizam sistemas de energia redundante, resfriamento avançado e monitoramento contínuo para minimizar qualquer risco de interrupção. Com nossa infraestrutura robusta, você pode confiar que suas operações continuarão funcionando sem problemas, mesmo em situações imprevistas.
                </textarea>
                            </div>

                            <!-- Redução de Custos Operacionais -->
                            <div class="form-group">
                                <label for="cost-reduction">Redução de Custos Operacionais</label>
                                <textarea id="cost-reduction" name="cost-reduction" class="form-control h-150px"
                                    rows="6">
Investir em infraestrutura de TI interna pode ser caro e oneroso. Utilizando nossos serviços de datacenter, você reduz os custos associados à compra e manutenção de hardware, energia e espaço físico. Nossos serviços são projetados para serem custo-efetivos, permitindo que você concentre seus recursos em áreas mais estratégicas do seu negócio.
                </textarea>
                            </div>

                            <!-- Suporte Especializado e Atendimento Personalizado -->
                            <div class="form-group">
                                <label for="support">Suporte Especializado e Atendimento Personalizado</label>
                                <textarea id="support" name="support" class="form-control h-150px" rows="6">
Na TAC, entendemos que cada empresa tem necessidades únicas. É por isso que oferecemos suporte especializado e atendimento personalizado para garantir que nossos serviços atendam às suas expectativas. Nossa equipe de especialistas está disponível para fornecer assistência contínua e garantir que suas operações sejam sempre otimizadas.
                </textarea>
                            </div>

                            <!-- Conformidade e Certificações -->
                            <div class="form-group">
                                <label for="compliance">Conformidade e Certificações</label>
                                <textarea id="compliance" name="compliance" class="form-control h-150px" rows="6">
Com o aumento das regulamentações e normas de conformidade, é fundamental garantir que seus serviços de TI estejam em conformidade com as melhores práticas e padrões da indústria. Nossos datacenters são certificados e atendem a rigorosos padrões de conformidade, garantindo que sua empresa esteja sempre alinhada com as exigências legais e regulatórias.
                </textarea>
                            </div>

                            <!-- Foco na Inovação -->
                            <div class="form-group">
                                <label for="innovation">Foco na Inovação</label>
                                <textarea id="innovation" name="innovation" class="form-control h-150px" rows="6">
Ao terceirizar seus serviços de datacenter para a TAC, você libera sua equipe interna para se concentrar na inovação e no desenvolvimento de novos produtos e serviços. Isso não só aumenta a eficiência operacional, mas também permite que sua empresa se mantenha competitiva e relevante no mercado.
                </textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Botões de Ação -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <input type="submit" class="btn btn-dark" name="salvardadosdatacenter"
                                    value="Salvar Conteúdo de DATACENTER">
                                <input type="reset" class="btn btn-danger" value="Limpar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </details>



    <details class="col-lg-12">
        <summary style="font-size: 20px;">Conteúdo de aplicações & sistemas</summary>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Aplicações & Sistemas da TAC</h4>
                        <div class="basic-form">

                            <!-- Soluções Personalizadas e Escaláveis -->
                            <div class="form-group">
                                <label for="solucoes-personalizadas">Soluções Personalizadas e Escaláveis</label>
                                <textarea id="solucoes-personalizadas" name="solucoes-personalizadas"
                                    class="form-control h-150px" rows="6" required>
Na TAC, sabemos que cada empresa é única. Nossas soluções de desenvolvimento de aplicações são personalizadas para atender às necessidades específicas de cada cliente. Desde sistemas internos de gestão até plataformas voltadas ao consumidor final, desenvolvemos aplicativos escaláveis que crescem junto com o seu negócio. Isso significa que, à medida que sua empresa expande, suas soluções de TI acompanham o ritmo, sem a necessidade de constantes reconfigurações ou substituições.
                        </textarea>
                            </div>
                            <br>

                            <!-- Integração de Sistemas -->
                            <div class="form-group">
                                <label for="integracao-sistemas">Integração de Sistemas: Otimize a Produtividade</label>
                                <textarea id="integracao-sistemas" name="integracao-sistemas"
                                    class="form-control h-150px" rows="6" required>
Em muitas empresas, o maior desafio é fazer com que diferentes sistemas de software "conversem" entre si. A TAC oferece serviços especializados de integração de sistemas, conectando todas as suas ferramentas e plataformas em um ecossistema unificado. Isso melhora a produtividade e elimina retrabalhos, pois informações cruciais fluem automaticamente entre departamentos e sistemas, reduzindo falhas e economizando tempo.
                        </textarea>
                            </div>
                            <br>

                            <!-- Segurança e Confiabilidade -->
                            <div class="form-group">
                                <label for="seguranca-confiabilidade">Segurança e Confiabilidade em Primeiro
                                    Lugar</label>
                                <textarea id="seguranca-confiabilidade" name="seguranca-confiabilidade"
                                    class="form-control h-150px" rows="6" required>
Quando se trata de desenvolvimento de sistemas, segurança não é apenas uma vantagem — é uma exigência. Com o aumento das ameaças cibernéticas, a TAC assegura que cada aplicação desenvolvida siga os mais rigorosos padrões de segurança, com proteção contra vulnerabilidades e monitoramento constante para identificar qualquer ameaça em tempo real. Seus dados estarão sempre protegidos, garantindo a confiança de seus clientes e parceiros.
                        </textarea>
                            </div>
                            <br>

                            <!-- Automatização de Processos -->
                            <div class="form-group">
                                <label for="automatizacao-processos">Automatização de Processos: Reduza Custos e
                                    Erros</label>
                                <textarea id="automatizacao-processos" name="automatizacao-processos"
                                    class="form-control h-150px" rows="6" required>
Automatizar processos é essencial para reduzir custos operacionais e minimizar erros humanos. Com as soluções da TAC, automatizamos fluxos de trabalho críticos, permitindo que sua equipe se concentre em tarefas estratégicas, enquanto sistemas automáticos cuidam das operações repetitivas. Isso não só melhora a eficiência, mas também promove maior precisão nas operações diárias.
                        </textarea>
                            </div>
                            <br>

                            <!-- Suporte Técnico -->
                            <div class="form-group">
                                <label for="suporte-tecnico">Suporte Técnico Dedicado</label>
                                <textarea id="suporte-tecnico" name="suporte-tecnico" class="form-control h-150px"
                                    rows="6" required>
Entendemos que a implementação de novos sistemas pode trazer dúvidas e desafios. Por isso, a TAC oferece um suporte técnico contínuo, garantindo que seus sistemas estejam sempre operando em plena capacidade. Nossa equipe de especialistas está disponível para realizar ajustes e melhorias conforme necessário, acompanhando de perto as necessidades do seu negócio.
                        </textarea>
                            </div>
                            <br>

                            <!-- Inovação ao Seu Alcance -->
                            <div class="form-group">
                                <label for="inovacao">Inovação ao Seu Alcance</label>
                                <textarea id="inovacao" name="inovacao" class="form-control h-150px" rows="6" required>
Em um mercado cada vez mais competitivo, inovar é vital. Ao contar com as soluções de Aplicações & Sistemas da TAC, sua empresa estará sempre na vanguarda tecnológica, com acesso a tecnologias de ponta, metodologias ágeis e as melhores práticas do setor. Nossa missão é transformar suas ideias em realidade, impulsionando seu negócio para novos patamares.
                        </textarea>
                            </div>
                            <br>

                            <!-- Botões de Ação -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark" name="salvardadosaplicacoes"
                                    value="Salvar Dados de Aplicações & Sistemas">
                                <input type="reset" class="btn btn-danger" value="Limpar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </details>








    <details class="col-lg-12">
        <summary style="font-size: 20px;">SOC & NOC</summary>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">SOC e NOC da TAC</h4>
                        <div class="basic-form">

                            <!-- SOC: Proteção Ativa 24/7 -->
                            <div class="form-group">
                                <label for="soc-protecao">SOC (Security Operations Center): Proteção Ativa 24/7</label>
                                <textarea id="soc-protecao" name="soc-protecao" class="form-control h-150px" rows="6"
                                    required>
O SOC da TAC é dedicado a proteger a infraestrutura digital da sua empresa contra ameaças cibernéticas em tempo real. Contamos com uma equipe de especialistas em segurança cibernética que monitora, detecta e responde a incidentes de segurança continuamente.
                        </textarea>
                            </div>
                            <br>

                            <!-- Vantagens do SOC -->
                            <div class="form-group">
                                <label for="vantagens-soc">Vantagens do SOC da TAC</label>
                                <textarea id="vantagens-soc" name="vantagens-soc" class="form-control h-150px" rows="6"
                                    required>
- Monitoramento Proativo 24/7: Estamos sempre atentos a qualquer sinal de vulnerabilidade ou ataque, garantindo que as ameaças sejam detectadas antes de causar danos.
- Respostas Imediatas a Incidentes: Quando um problema é identificado, nossa equipe age rapidamente para conter e mitigar os riscos, minimizando o impacto sobre o seu negócio.
- Análise de Dados e Inteligência de Ameaças: Utilizamos tecnologias avançadas para analisar padrões de comportamento e identificar ameaças emergentes, garantindo uma defesa preventiva e contínua.
- Conformidade e Auditoria: Mantemos sua empresa em conformidade com os regulamentos de segurança mais exigentes.
                        </textarea>
                            </div>
                            <br>

                            <!-- NOC: Garantia de Desempenho e Estabilidade -->
                            <div class="form-group">
                                <label for="noc-desempenho">NOC (Network Operations Center): Garantia de Desempenho e
                                    Estabilidade</label>
                                <textarea id="noc-desempenho" name="noc-desempenho" class="form-control h-150px"
                                    rows="6" required>
O NOC da TAC tem como objetivo monitorar e garantir o funcionamento contínuo e otimizado da sua infraestrutura de rede. Nossa equipe supervisiona sua rede 24 horas por dia, identificando e resolvendo problemas de desempenho e interrupções.
                        </textarea>
                            </div>
                            <br>

                            <!-- Vantagens do NOC -->
                            <div class="form-group">
                                <label for="vantagens-noc">Vantagens do NOC da TAC</label>
                                <textarea id="vantagens-noc" name="vantagens-noc" class="form-control h-150px" rows="6"
                                    required>
- Monitoramento Contínuo: Nossa equipe supervisiona sua rede 24/7, garantindo operação contínua.
- Manutenção Preventiva: Aplicamos correções proativas para otimizar o desempenho de rede e evitar falhas inesperadas.
- Gerenciamento de Infraestrutura: Monitoramos todos os componentes críticos da rede, garantindo uma operação sem interrupções.
- Escalabilidade: Nossas soluções de NOC são escaláveis, acompanhando o crescimento do seu negócio.
                        </textarea>
                            </div>
                            <br>

                            <!-- Porque escolher SOC e NOC da TAC -->
                            <div class="form-group">
                                <label for="escolher-tac">Por que Escolher o SOC e NOC da TAC?</label>
                                <textarea id="escolher-tac" name="escolher-tac" class="form-control h-150px" rows="6"
                                    required>
Com uma equipe altamente qualificada, a TAC oferece monitoramento 24/7, resposta rápida e tecnologias avançadas, garantindo segurança e performance para sua infraestrutura digital.
                        </textarea>
                            </div>
                            <br>

                            <!-- Botões de Ação -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark" name="salvardadossocnoc"
                                    value="Salvar Dados de SOC e NOC">
                                <input type="reset" class="btn btn-danger" value="Limpar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </details>





    <details class="col-lg-12">
        <summary style="font-size: 20px;">XaaS</summary>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Serviços Geridos, IaaS e IoT > XaaS da TAC</h4>
                        <div class="basic-form">

                            <!-- Serviços Geridos -->
                            <div class="form-group">
                                <label for="servicos-geridos">Serviços Geridos: A Tranquilidade que Você Precisa</label>
                                <textarea id="servicos-geridos" name="servicos-geridos" class="form-control h-150px"
                                    rows="6" required>
Manter uma infraestrutura de TI robusta e atualizada pode ser um desafio. Os Serviços Geridos da TAC garantem que sua empresa tenha à disposição uma equipe de especialistas dedicados a monitorar, gerenciar e otimizar sua infraestrutura. Com nossos serviços, você reduz custos operacionais e maximiza a eficiência, permitindo que sua equipe se concentre em atividades estratégicas.
                        </textarea>
                            </div>
                            <br>

                            <!-- IaaS -->
                            <div class="form-group">
                                <label for="iaas">IaaS (Infrastructure as a Service): A Base para Crescimento</label>
                                <textarea id="iaas" name="iaas" class="form-control h-150px" rows="6" required>
A Infraestrutura como Serviço (IaaS) da TAC oferece uma solução flexível e escalável, permitindo que sua empresa acesse recursos computacionais sob demanda. Com o IaaS, você pode expandir sua infraestrutura de acordo com suas necessidades, pagando apenas pelo que utiliza, sem os altos custos de manutenção de hardware.
                        </textarea>
                            </div>
                            <br>

                            <!-- IoT e XaaS -->
                            <div class="form-group">
                                <label for="iot-xaas">IoT e XaaS: Inovação e Flexibilidade</label>
                                <textarea id="iot-xaas" name="iot-xaas" class="form-control h-150px" rows="6" required>
A TAC está na vanguarda da inovação com soluções de IoT (Internet das Coisas), conectando dispositivos inteligentes para monitorar e controlar processos em tempo real. Além disso, oferecemos a flexibilidade do XaaS (Anything as a Service), permitindo que qualquer necessidade tecnológica seja acessada como um serviço, desde plataformas IoT até soluções personalizadas sob demanda.
                        </textarea>
                            </div>
                            <br>

                            <!-- Vantagens TAC -->
                            <div class="form-group">
                                <label for="vantagens-tac">Por que Escolher a TAC?</label>
                                <textarea id="vantagens-tac" name="vantagens-tac" class="form-control h-150px" rows="6"
                                    required>
Ao escolher a TAC, sua empresa se beneficia de suporte especializado, escalabilidade, inovações contínuas e soluções que reduzem custos, além de aumentar a eficiência e garantir que sua infraestrutura esteja sempre pronta para o futuro.
                        </textarea>
                            </div>
                            <br>

                            <!-- Botões de Ação -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark" name="salvardadosservicos"
                                    value="Salvar Dados de Serviços Geridos, IaaS e IoT > XaaS">
                                <input type="reset" class="btn btn-danger" value="Limpar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </details>


    <details class="col-lg-12">
        <summary style="font-size: 20px;">Soluções</summary>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Soluções de Sustentabilidade: O Futuro da TI com a TAC</h4>
                        <div class="basic-form">

                            <!-- Infraestruturas Eficientes e Escaláveis -->
                            <div class="form-group">
                                <label for="infraestruturas-eficientes">Infraestruturas Eficientes e Escaláveis</label>
                                <textarea id="infraestruturas-eficientes" name="infraestruturas-eficientes"
                                    class="form-control h-150px" rows="6" required>
A TAC desenvolve infraestruturas que não apenas suportam as operações atuais, mas também se adaptam ao crescimento futuro. Com soluções em IaaS (Infrastructure as a Service), oferecemos ambientes flexíveis que permitem às empresas escalar recursos conforme necessário.
                        </textarea>
                            </div>
                            <br>

                            <!-- Redes Resilientes -->
                            <div class="form-group">
                                <label for="redes-resilientes">Redes Resilientes</label>
                                <textarea id="redes-resilientes" name="redes-resilientes" class="form-control h-150px"
                                    rows="6" required>
Nossas soluções de rede garantem conectividade contínua, com monitoramento 24/7 e capacidade de resposta a incidentes em tempo real, melhorando a performance e reduzindo o risco de interrupções que podem impactar os negócios.
                        </textarea>
                            </div>
                            <br>

                            <!-- Desenvolvimento Ágil e Personalizado -->
                            <div class="form-group">
                                <label for="desenvolvimento-agil">Desenvolvimento Ágil e Personalizado</label>
                                <textarea id="desenvolvimento-agil" name="desenvolvimento-agil"
                                    class="form-control h-150px" rows="6" required>
Utilizamos metodologias ágeis que permitem desenvolver soluções personalizadas rapidamente, adaptando-nos às necessidades específicas de cada cliente, resultando em aplicativos e sistemas que superam expectativas.
                        </textarea>
                            </div>
                            <br>

                            <!-- Automação e Inteligência Artificial -->
                            <div class="form-group">
                                <label for="automacao-ia">Automação e Inteligência Artificial</label>
                                <textarea id="automacao-ia" name="automacao-ia" class="form-control h-150px" rows="6"
                                    required>
Incorporamos automação e inteligência artificial para melhorar a tomada de decisões com insights baseados em dados, promovendo operações mais inteligentes e ágeis que liberam as equipes para se concentrarem em atividades estratégicas.
                        </textarea>
                            </div>
                            <br>

                            <!-- Botões de Ação -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark" name="salvardadossustentabilidade"
                                    value="Salvar Dados de Sustentabilidade">
                                <input type="reset" class="btn btn-danger" value="Limpar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </details>

</div>
</div>
<!--**********************************
            Content body end
        ***********************************-->


<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://">TACSystem</a> 2024</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>

</body>

</html>