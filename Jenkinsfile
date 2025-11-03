pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                echo 'Checkout stage running'
                git branch: 'main', url: 'https://github.com/Yvonne/ride-sharing-app.git'
            }
        }
        
        stage('Build') {
            steps {
                echo 'Build stage running'
                sh 'docker-compose build'
            }
        }
        
        stage('Test') {
            steps {
                echo 'Test stage running'
                sh 'echo "Running tests..."'
            }
        }
        
        stage('Deploy') {
            steps {
                echo 'Deploy stage running'
                sh 'docker-compose up -d'
            }
        }
        
        stage('Cleanup') {
            steps {
                echo 'Cleanup stage running'
                sh 'echo "Cleaning up..."'
            }
        }
    }
    
    post {
        always {
            echo 'Pipeline completed'
        }
        success {
            echo 'Pipeline succeeded!'
        }
        failure {
            echo 'Pipeline failed!'
        }
    }
}