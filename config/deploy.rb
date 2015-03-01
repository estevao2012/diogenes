# config valid only for Capistrano 3.1
lock '3.1.0'

set :application, 'guiadeap'
set :deploy_user, 'guiadeap'
set :user, 'guiadeap'

set :stages, %w(production staging)
set :default_stage, 'staging'

set :scm, :git
set :repo_url, 'git@github.com:estevao2012/sp_site1.git'

set :deploy_via, :remote_cache
set :copy_exclude, %w{.git .DS_Store www docs conf design site}
set :keep_releases, 5

set :linked_dirs, %w{uploads}


namespace :deploy do

  task :my_symlink do 
    on roles(:app) do
      execute "ln -nfs #{shared_path}/uploads #{release_path}/app/wp-content/uploads"
      execute "ln -nfs #{shared_path}/wp-config.php #{release_path}/app/wp-config.php"
      execute "ln -nfs #{shared_path}/.htaccess #{release_path}/app/.htaccess"
      execute "ln -nfs #{shared_path}/aam #{release_path}/app/wp-content/aam" 
    end
  end
  before 'restart', 'my_symlink'

  desc 'Copy to www'
  task :copy do
    on roles(:app) do
      execute "sudo cp -r #{release_path}/app/* /var/www/app"
    end
  end
  # before 'restart', 'copy'


  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      execute "sudo service apache2 restart"
    end
  end

  desc 'clean database'
  task :clean_db do
    on roles(:app) do
      execute "mysql -uroot -pb8wnv4e7b9 -Nse 'show tables' wp_elo | while read table; do mysql -uroot -pb8wnv4e7b9 -e \"truncate table $table\" wp_elo; done"
    end
  end

  desc 'restore dump'
  task :restore_db do
    on roles(:app) do
      execute "mysql -uroot -pb8wnv4e7b9 wp_elo < #{shared_path}/dumps/dump.sql"
    end
  end 
  
  before 'restore_db', 'clean_db'

  task :backup_database_wordpress do
    on roles(:app) do 
      execute "mkdir -p #{shared_path}/dumps"
      execute "mysqldump -uroot -pb8wnv4e7b9 wp_elo > #{shared_path}/dumps/dump_#{Time.now.strftime("%m-%d_%H-%M-%S")}.sql" 
    end
  end


  after :publishing, :restart

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
