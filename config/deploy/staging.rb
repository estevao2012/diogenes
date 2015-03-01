set :stage, :staging
set :branch,                    'master'
set :group,                     'guiadeap'
set :use_sudo,                  false
set :user,                      'guiadeap'
set :deploy_to, 								'/home/#{fetch(:deploy_user)}/www'
set :server_name,               '143.95.253.160'


server '143.95.253.160', user: 'ubuntu', roles: [:app]

