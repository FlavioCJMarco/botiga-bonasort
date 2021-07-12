
        <?php
            require __DIR__ . "/connectaBD.php";

            session_start();

            $username = "";
            $password = "";
            $id = "";

            $connexio = connectaBD();

            if(isset($_POST['submitLogin'])){

                $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
                $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

                $query = "SELECT usuari, password FROM Usuari WHERE usuari=:username";
                $stmt = $connexio->prepare($query);

                $stmt->bindValue(':username', $username);
                $stmt->execute();

                $usuari = $stmt->fetch((PDO::FETCH_ASSOC));

                if(($usuari === false)){
                    echo "<script> 
                            alert('Usuario incorrecto'); 
                            window.location = 'http://tdiw-d1.deic-docencia.uab.cat/index.php?accio=login'; 
                          </script>";
                }
                else{
                    if((filter_var($_POST["password"], FILTER_DEFAULT)) && password_verify($_POST['password'], $usuari['password'])){
                        $_SESSION['user_id'] = $username;
                        echo 'ESTAS LOGEADO';
                        header('Location: ../index.php');
                        exit;
                    }
                    else{
                        echo "<script> 
                               alert('Contraseña incorrecta');
                               window.location = 'http://tdiw-d1.deic-docencia.uab.cat/index.php?accio=login'; 
                              </script>";
                    }
                }
            }

        ?>
