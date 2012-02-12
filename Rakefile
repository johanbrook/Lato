require "rake"

scss_file = "./theme/assets/stylesheets/master.scss"
js_file = "./theme/assets/javascripts/main.coffee"
output_dir = "./assets/"

desc "Compile Sass for production"
task :sass do
  puts `sass #{scss_file}:#{File.join output_dir, "stylesheets/master.css" } -f -t compressed`
  puts "* Sass compiled for production"
end


desc "Compile CoffeeScript for production"
task :coffee do
  puts `coffee -o assets/javascripts -c #{js_file}`
  puts "* CoffeeScript compiled"
end

desc "Deploy to johanbrook.com"
task :deploy => :sass do
  puts "* Deployed"
end