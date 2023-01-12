pipeline {
 agent any
	 options {
    buildDiscarder(logRotator(numToKeepStr: '5'))   
  }

 environment {
   GIT_COMMIT_SHORT = sh(returnStdout: true, script: '''echo $GIT_COMMIT | head -c 7''')
 }



 stages {
   stage('Prepare .env') {
     steps {
       sh 'echo GIT_COMMIT_SHORT=$(echo $GIT_COMMIT_SHORT) >> .env'
     }
   }


   stage('Build dockerhub') {
     steps {
		sh 'docker build . -t ramses01/blogx2:$GIT_COMMIT_SHORT'
         sh 'docker tag ramses01/blogx2:$GIT_COMMIT_SHORT ramses01/blogx2:$GIT_COMMIT_SHORT'
         sh 'docker push ramses01/blogx2:$GIT_COMMIT_SHORT'
       
     }
   }
   
   	 stage('Deploy to remote server') {
     steps {
			sshPublisher(publishers: [sshPublisherDesc(configName: 'blogx2', transfers: [sshTransfer(cleanRemote: false, excludes: '', execCommand: '''docker-compose up -d
			sleep 40
			docker exec blog_app bash -c \'cd /app;	 php artisan key:generate; php artisan migrate\'''', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: '', remoteDirectorySDF: false, removePrefix: '', sourceFiles: '.env, docker-compose.yaml')], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: false)])
     }
   }
   
 


 }
}
