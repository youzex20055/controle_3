pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                echo 'Build de l’application...'
            }
        }
        stage('Tests Unitaires') {
            steps {
                // Utilisation de PHP pour exécuter les tests
                bat 'php tests\\testIndex.php'
            }
        }
        stage('Analyse SonarQube') {
            steps {
                script {
                    withSonarQubeEnv('SonarQube') {
                        // Commande sonar-scanner sous Windows
                        bat 'sonar-scanner.bat'
                    }
                }
            }
        }
        stage('Déploiement') {
            steps {
                script {
                    bat '''
                    if not exist C:\\web\\projet-php (
                        mkdir C:\\web\\projet-php
                    )
                    xcopy /E /I .\\* C:\\web\\projet-php
                    '''
                }
            }
        }
        stage('Run') {
            steps {
                echo 'Application déployée avec succès!'
            }
        }
    }
}
