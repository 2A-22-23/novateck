<?php

class config
{
    private static $pdo = NULL;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=nova-teck',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
    
    public static function getCovoiturages()
    {
        $pdo = self::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM covoiturage JOIN voiture ON covoiturage.mat_v = voiture.mat_voiture');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
