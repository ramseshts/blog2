pipeline {  
  agent any 
  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))   
  }
  stages {
    stage('Build Image') {
        steps {
            script {
                if (env.BRANCH_NAME == 'dev') {                     
            sh 'docker build -t triagungtio/blogx:0.0.$BUILD_NUMBER-dev .'
                }
                 else if (env.BRANCH_NAME == 'staging') {
            sh 'docker build -t triagungtio/blogx:0.0.$BUILD_NUMBER-staging .'
                }
                else if (env.BRANCH_NAME == 'main') {
            sh 'docker build -t triagungtio/blogx:0.0.$BUILD_NUMBER-prod .'
                }
                else {
                    sh 'echo Nothing to Build'
                }
            }
        }
    }
    stage('Push to Registry') {
        steps {
            script {
             if (env.BRANCH_NAME == 'dev') {
            sh 'docker push triagungtio/blogx:0.0.$BUILD_NUMBER-dev'
                }
                else if (env.BRANCH_NAME == 'staging') {
            sh 'docker push triagungtio/blogx:0.0.$BUILD_NUMBER-staging' 
                }
                else if (env.BRANCH_NAME == 'main') {
            sh 'docker push triagungtio/blogx:0.0.$BUILD_NUMBER-prod' 
                }
                else {
                    sh 'echo Nothing to Push'
                }
        }
      }
    }
    stage('Deploy to Kubernetes Cluster') {
        steps {
        script {
             if (env.BRANCH_NAME == 'dev') {
                    withKubeConfig(caCertificate: '', clusterName: '', contextName: '', credentialsId: 'k8s', namespace: '', serverUrl: '') {
                        sh "kubectl apply -f deployment/dev/namespace.yaml"
                        sh "kubectl apply -f deployment/dev/configmap.yaml"
                        sh "kubectl apply -f deployment/dev/db.yaml"
                        sh 'cat deployment/dev/app.yaml | sed "s/{{NEW_TAG}}/0.0.$BUILD_NUMBER-dev/g" |  kubectl apply -f -'
                 }
                }
                else if (env.BRANCH_NAME == 'staging') {
                    withKubeConfig(caCertificate: '', clusterName: '', contextName: '', credentialsId: 'k8s', namespace: '', serverUrl: '') {
                        sh "kubectl apply -f deployment/staging/namespace.yaml"
                        sh "kubectl apply -f deployment/staging/configmap.yaml"
                        sh "kubectl apply -f deployment/staging/db.yaml"
                        sh 'cat deployment/staging/app.yaml | sed "s/{{NEW_TAG}}/0.0.$BUILD_NUMBER-staging/g" |  kubectl apply -f -'
                 }
                }
                else if (env.BRANCH_NAME == 'main') {
                    withKubeConfig(caCertificate: '', clusterName: '', contextName: '', credentialsId: 'k8s', namespace: '', serverUrl: '') {
                        sh "kubectl apply -f deployment/production/namespace.yaml"
                        sh "kubectl apply -f deployment/production/configmap.yaml"
                        sh "kubectl apply -f deployment/production/db.yaml"
                        sh 'cat deployment/production/app.yaml | sed "s/{{NEW_TAG}}/0.0.$BUILD_NUMBER-prod/g" |  kubectl apply -f -'
                 }
                }
                else {
                    sh 'echo Nothing to deploy'
                }
        }
      }
    } 
}
        post {
            success {
                slackSend channel: '#jenkins',
                color: 'good',
                message: "*${currentBuild.currentResult}:* Job ${env.JOB_NAME} build ${env.BUILD_NUMBER}\n More info at: ${env.BUILD_URL}"
            }    

            failure {
                slackSend channel: '#jenkins',
                color: 'danger',
                message: "*${currentBuild.currentResult}:* Job ${env.JOB_NAME} build ${env.BUILD_NUMBER}\n More info at: ${env.BUILD_URL}"
                }

        }
}
