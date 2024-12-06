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
                script {
                    bat 'php "C:\\Users\\user\\Desktop\\controle 3\\tests\\testIndex.php"'
                }
            }
        }
        stage('Analyse SonarQube') {
            steps {
                script {
                    withSonarQubeEnv('SonarQube') {
                        // Commande sonar-scanner sous Windows
                        bat '''
                        sonar-scanner.bat ^
                        -D"sonar.projectKey=controle_3" ^
                        -D"sonar.sources=C:\\Users\\user\\Desktop\\controle 3" ^
                        -D"sonar.host.url=http://localhost:9000" ^
                        -D"sonar.login=sqa_94fed0bfc2252a6f29e598e4a2836afb0243128f"
                        '''
                    }
                }
            }
        }
        stage('Déploiement') {
            steps {
                script {
                    bat '''
                    if not exist "C:\\web\\controle3" (
                        mkdir "C:\\web\\controle3"
                    )
                    xcopy /E /I "C:\\Users\\user\\Desktop\\controle 3\\*" "C:\\web\\controle3"
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
