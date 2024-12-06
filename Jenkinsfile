pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                script {
                    echo 'PHP project detected - skipping build step as no compilation is needed.'
                }
            }
        }

        stage('Test Unitaires') {
            steps {
                script {
                    if (fileExists('vendor/bin/phpunit')) {
                        echo 'Running unit tests with PHPUnit'
                        sh './vendor/bin/phpunit'
                    } else {
                        echo 'PHPUnit not found. Skipping test step.'
                    }
                }
            }
        }

        stage('Analyse Qualité de Code') {
            steps {
                withSonarQubeEnv('SonarQube') {
                    echo 'Running SonarQube analysis for PHP project'
                    sh 'sonar-scanner -Dsonar.projectKey=php_controle_3'
                }
            }
        }

        stage('Déploiement') {
            steps {
                script {
                    echo 'Deploying application to /var/www/controle3'
                    sh 'mkdir -p /var/www/controle3'
                    sh 'cp -r . /var/www/controle3/'
                }
            }
        }

        stage('Run') {
            steps {
                script {
                    echo 'Application PHP prête et hébergée sur le serveur web.'
                }
            }
        }
    }
}
