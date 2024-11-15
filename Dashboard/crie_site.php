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
              

                <!-- Segunda Seção: Sobre a Empresa -->
               

                <!-- Terceira Seção: Anos de Experiência e Totais -->
            
                <!-- Quarta Seção: Upload do Logotipo -->
              

                <!-- Botões de Ação -->
               
            </div>

    </form>

  











 



    








    







  

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