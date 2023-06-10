<?php

    if(isset($_POST['emailCadastro']) || isset($_POST['cpfCadastro']) || isset($_POST['telefoneCadastro']) || isset($_POST['nomeCadastro']) || isset($_POST['senhaCadastro']) || isset($_POST['confirma_senha'])) {

        include('banco.php');

        $nomeCadastro = $_POST['nomeCadastro'];
        $telefoneCadastro = $_POST['telefoneCadastro'];
        $cpfCadastro = $_POST['cpfCadastro'];
        $emailCadastro = $_POST['emailCadastro'];
        $senhaCadastro = $_POST['senhaCadastro'];
        // senhaCadastro sera cryptografada no banco

        // senhaCadastro sera cryptografada no banco
            // $confirma_senha = $_POST['confirma_senha'];
            // if($senhaCadastro == $confirma_senha) {
            //     $senhaCadastro = password_hash($senhaCadastro, PASSWORD_DEFAULT);
            //     $sql = "INSERT INTO paciente (nome_paciente, telefone_paciente, cpf_paciente, email_paciente, sen
            //     ha_paciente) VALUES ('$nomeCadastro', '$telefoneCadastro', '$cpfCadastro',
            //     '$emailCadastro', '$senhaCadastro')";
            //     if($conexao->query($sql) === TRUE) {
            //         echo "Cadastro realizado com sucesso!";
            //         $sql = "SELECT * FROM paciente WHERE email = '$emailCadastro'";
            //         $result = $conexao->query($sql);
            //         if ($result->num_rows > 0) {
            //             while($row = $result->fetch_assoc()) {
            //                 $_SESSION['id'] = $row['id'];
            //                 $_SESSION['nome'] = $row['nome'];
            //                 header('Location: index.php');
            //             }
            //         }
            //     } else {
            //         echo "Erro: " . $sql . "<br>" . $conexao->error;
            //     }


        //se o emailCadastro for o mesmo do email_paciente do banco de dados nao sera armazenado
        // $sql = "SELECT * FROM paciente WHERE email_paciente = '$emailCadastro'";
        // $result = mysqli_query($conexao, $sql);
        // if(mysqli_num_rows($result) > 0) {
        //     echo "<script>alert('Email já cadastrado!');</script>";
        //     echo "<script>window.location.href = 'cadastro.php';</script>";
        // } else {
        //     $sql = "INSERT INTO paciente (nome_paciente, telefone_paciente
        //     , cpf_paciente, email_paciente, senha_paciente) VALUES ('
        //     $nomeCadastro', '$telefoneCadastro', '$cpfCadastro', '$emailCadastro
        //     ','$senhaCadastro')";
        //     if(mysqli_query($conexao, $sql)) {
        //         echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        //         echo "<script>window.location.href = 'login.php';</script>";
        //         } else {
        //             echo "<script>alert('Erro ao cadastrar!');</script>";
        //             echo "<script>window.location.href = 'cadastro.php';</script>";
        //         }
        // }

        $mysqli->query("INSERT INTO paciente (nome_paciente, telefone_paciente, cpf_paciente, email_paciente, senha_paciente) VALUES('$nomeCadastro', '$telefoneCadastro', '$cpfCadastro', '$emailCadastro', '$senhaCadastro')");
    }
// }
?>