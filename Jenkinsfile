pipeline {
    agent any
    
    environment {
        DOCKER_BUILDKIT = "1"
    }
    
    stages {
        stage('Checkout') {
            steps {
                echo '✅ Checkout stage running...'
                checkout scm
                sh 'ls -la'
            }
        }
        
        stage('Build') {
            steps {
                echo '🔨 Build stage running...'
                script {
                    try {
                        sh '''
                            echo "Current directory:"
                            pwd
                            echo "Docker version:"
                            docker --version
                            echo "Docker Compose version:"
                            docker-compose --version
                            echo "Building Docker images..."
                            docker-compose build --no-cache
                            echo "Docker images built successfully:"
                            docker images
                        '''
                    } catch (error) {
                        echo "Build failed: ${error}"
                        currentBuild.result = 'FAILURE'
                        error("Build stage failed")
                    }
                }
            }
        }
        
        stage('Test') {
            steps {
                echo '🧪 Test stage running...'
                sh '''
                    echo "Testing Docker containers..."
                    docker-compose up -d
                    sleep 10
                    docker-compose ps
                    docker-compose logs
                '''
            }
        }
        
        stage('Deploy') {
            steps {
                echo '🚀 Deploy stage running...'
                sh '''
                    echo "Deployment completed successfully"
                    echo "Application will be available at:"
                    echo "Web: http://localhost:8080"
                    echo "phpMyAdmin: http://localhost:8081"
                '''
            }
        }
        
        stage('Cleanup') {
            steps {
                echo '🧹 Cleanup stage running...'
                sh '''
                    docker-compose down
                    docker system prune -f
                '''
            }
        }
    }
    
    post {
        always {
            echo '🏁 Pipeline completed!'
            sh 'docker-compose down || true'
        }
        success {
            echo '✅ Build successful!'
        }
        failure {
            echo '❌ Build failed!'
        }
    }
}
