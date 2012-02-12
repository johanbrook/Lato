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
  puts `coffee -o #{File.join output_dir, "javascripts"} -c #{js_file}`
  puts "* CoffeeScript compiled"
end

desc "Deploys to johanbrook.com. Auto-compile and commit all SCSS and Coffee files."
task :deploy => [:sass, :coffee] do
  files = [
    "theme/assets/stylesheets",
    "theme/assets/javascripts",
    File.join(output_dir, "stylesheets/master.css"),
    File.join(output_dir, "javascripts/main.js")
  ]
  
  puts `git commit #{files.join(" ")} -m "*Deploy* (Force compile SCSS and CoffeeScript files)"`
        
  puts `git push origin master`
  puts "* Deployed"
end