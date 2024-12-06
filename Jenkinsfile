pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                echo 'PHP project detected - skipping build step as no compilation is needed.'
            }
        }

        stage('Test Unitaires') {
            steps {
                script {
                    if (fileExists('vendor\\bin\\phpunit')) {
                        bat 'php vendor\\bin\\phpunit'
                    } else {
                        echo 'PHPUnit not found. Skipping test step.'
                    }
                }
            }
        }

        stage('Analyse Qualité de Code') {
            steps {
                withSonarQubeEnv('SonarQube') {
                    bat 'sonar-scanner -Dsonar.projectKey=php_controle_3'
                }
            }
        }

        stage('Déploiement') {
            steps {
                bat '''
                if not exist C:\\var\\www\\controle3 mkdir C:\\var\\www\\controle3
                xcopy /E /I /Y . C:\\var\\www\\controle3
                '''
            }
        }

        stage('Run') {
            steps {
                echo 'Application PHP prête et hébergée sur le serveur web.'
            }
        }
    }
}
