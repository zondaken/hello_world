<?php

class User
{
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
}

// TODO: return user instances
class DBHandler
{
    /**
     * @var mysqli $mysqli
     */
    private $mysqli;

    /**
     * @var PDO $pdo
     */
    private $pdo;

    public function __construct($host, $user, $pass, $db, $port = 5432)
    {
        //$this->mysqli = new mysqli($host, $username, $pass, $db);

        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$db";
            $this->pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function __destruct()
    {
        //$this->mysqli->close();
    }

    public function UserExists(string $username): bool
    {
        try {
            $sql = 'SELECT "id" FROM "user" WHERE "username" = ?' or die("Haha");
            $stmt = $this->pdo->prepare($sql) or die("Statement failed");
            $stmt->execute([$username]) or die("Query failed");
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function InsertUser(string $username, string $password): void
    {
        // TODO: fix md5
        //$password = md5($password);

        $sql = 'INSERT INTO "user" ("username", "password") VALUES(?, ?)';

        try {
            $stmt = $this->pdo->prepare($sql) or die("Statement failed");
            $stmt->execute([$username, $password]) or die("Query failed");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function GetUserByName(string $username)
    {
        $sql = 'SELECT "id", "username", "password" FROM "user" WHERE "username" = ?';

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$username]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;

            // TODO: replace assoc array by User instances

            /*if($row) {
                return new User($row['id'], $row['username'], $row['password']);
            }

            return false;*/
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function GetUserById(int $id)
    {
        $sql = 'SELECT "id", "username", "password" FROM "user" WHERE "id" = ?';

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return false;
    }

    public function GetAllUsers(): array
    {
        $users = [];

        $sql = 'SELECT "id", "username" FROM "user"';

        try {
            $stmt = $this->pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = $row;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $users;
    }

    public function ChangePassword(int $id, string $passwordNew): void
    {
        $sql = 'UPDATE "user" SET "password" = ? WHERE "id" = ?';

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$passwordNew, $id]);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}