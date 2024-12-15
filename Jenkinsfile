pipeline {
    agent any

    environment {
        // Nom du serveur SonarQube configuré dans Jenkins
        SONARQUBE_SERVER = 'SonarQube-Server'  
    }

    stages {
        stage('Checkout Code') {
            steps {
                echo 'Clonage du dépôt Git...'
                git 'https://github.com/youzex20055/controle_3.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                echo 'Installation des dépendances PHP avec Composer...'
                sh 'composer install'
            }
        }

        stage('Run Unit Tests') {
            steps {
                echo 'Exécution des tests unitaires avec PHPUnit...'
                sh './vendor/bin/phpunit tests/'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                echo 'Analyse du code avec SonarQube...'
                withSonarQubeEnv('SonarQube-Server') {
                    sh """
                    sonar-scanner \
                        -Dsonar.projectKey=cont3 \
                        -Dsonar.sources=src \
                        -Dsonar.tests=tests \
                        -Dsonar.php.tests.reportPath=tests \
                        -Dsonar.host.url=http://localhost:9000 \
                        -Dsonar.login=${sqp_5812d9ed4eb181541491486bc15a5f7e626a16bf}
                    """
                }
            }
        }

        stage('Quality Gate') {
            steps {
                echo 'Vérification du Quality Gate de SonarQube...'
                waitForQualityGate abortPipeline: true
            }
        }

        stage('Deploy Application') {
            steps {
                echo 'Déploiement de l\'application sur le serveur de production...'
                sh 'rsync -avz src/ user@your-server:/var/www/html/mon-projet-php/'
            }
        }

       stage('Run Application') {
    steps {
        echo 'Vérification de l\'application indexTest.php...'
        script {
            def response = sh(script: 'curl -o /dev/null -s -w "%{http_code}" http://192.168.1.100/tests/indexTest.php', returnStdout: true).trim()
            echo "Code de réponse HTTP : ${response}"
            if (response != '200') {
                error "Le fichier indexTest.php n'a pas répondu correctement. Code HTTP : ${response}"
            } else {
                echo "Le fichier indexTest.php est opérationnel avec succès !"
            }
        }
    }
}

    }

    post {
        success {
            echo 'Pipeline exécutée avec succès !'
        }
        failure {
            echo 'Échec de la pipeline. Veuillez vérifier les erreurs.'
        }
    }
}
