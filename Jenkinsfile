pipeline {
    agent any
    environment {
        PROJECT_DIR = "C:\\Users\\user\\Desktop\\controle 3"
    }
    stages {
        stage('Build') {
            steps {
                echo 'PHP project detected - skipping build step as no compilation is needed.'
            }
        }
        stage('Test Unitaires') {
            steps {
                script {
                    if (fileExists("${env.PROJECT_DIR}\\vendor\\bin\\phpunit")) {
                        bat "php ${env.PROJECT_DIR}\\vendor\\bin\\phpunit"
                    } else {
                        error "PHPUnit not found. Please ensure it is installed in ${env.PROJECT_DIR}\\vendor\\bin."
                    }
                }
            }
        }
        stage('Analyse Qualité de Code') {
            steps {
                script {
                    if (fileExists("${env.PROJECT_DIR}\\sonar-project.properties")) {
                        bat "sonar-scanner"
                    } else {
                        echo "No SonarQube configuration found. Skipping code quality analysis."
                    }
                }
            }
        }
        stage('Déploiement') {
            steps {
                script {
                    bat "php -S localhost:8080 -t ${env.PROJECT_DIR}"
                }
                echo "Application is running at http://localhost:8080"
            }
        }
        stage('Run') {
            steps {
                echo "Pipeline completed successfully."
            }
        }
    }
}
