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

   stage('Build Laravel') {
      steps {
       dir('database') {
         sh 'docker build blogx -f Dockerfile -t blogx:$GIT_COMMIT_SHORT'
         sh 'docker tag blogx:$GIT_COMMIT_SHORT heryfik/laravel:$GIT_COMMIT_SHORT'
         sh 'docker push heryfik/laravel:$GIT_COMMIT_SHORT'
       }
     }
   }

	 
	 stage('Deploy to remote server') {
     steps {
       sshPublisher(publishers: [sshPublisherDesc(configName: 'remote', transfers: [sshTransfer(cleanRemote: false, excludes: '', execCommand: '''docker-compose up -d
      
       sleep 40

       docker compose restart backend''', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: '', remoteDirectorySDF: false, removePrefix: '', sourceFiles: '.env,docker-compose.yaml')], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: false)])
     }
   }
 }
}
