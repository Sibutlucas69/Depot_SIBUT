<?php
class bddConnector
{
    private $host,$dbname,$user,$password,$pdo;
    private $dsn;
    private $bool;
    private $name;

    /**
     * bddConnector constructor.
     * @param $host
     * @param $name
     * @param $user
     * @param $password
     */
    public function __construct($host, $dbname, $user, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     *
     * Classe vérifiant mail et mot de passe, s'ils existent, alors retourne true, sinon retourne false
     *
     *
     * @param $mail
     * @param $pass
     * @return bool
     *
     */
    public function queryLogin($mail,$pass)
    {
        $dsn = 'mysql:dbname=' . $this->dbname . ';host=' . $this->host .'';
        $pdo = new PDO($dsn,$this->user,$this->password);

        foreach($pdo->query("SELECT * FROM membre WHERE email='" . $mail . "'AND password='". $pass . "'") as $row)
        {
            $this->name = $row['nom'];
            if($mail == $row['email'] && $pass == $row['password'] )

            {
            return true;

            }else

            {
            return false;
            }
        }

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * Création du compte utilisateur avec nom,prénom,mail et mot de passe, la date est également prise en compte dans la BDD
     *
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $pass
     */
    public function createAccount($nom,$prenom,$mail,$pass)
    {
        $boolexistant = $this->queryLogin($mail,$pass);
        $date = date('Y-m-d H:i:s');

        $dsn = 'mysql:dbname=' . $this->dbname . ';host=' . $this->host .'';
        $pdo = new PDO($dsn,$this->user,$this->password);

        if($boolexistant !== false)
        {
            $sql = "INSERT INTO membre (nom,prenom,email,password,date_creation) VALUES ('" . $nom . "','" . $prenom ."','" . $mail . "','" . $pass . "','" . $date ."' )";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        }

    }
}