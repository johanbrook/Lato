require "rake"

scss_file = "./theme/assets/stylesheets/master.scss"
js_file = "./theme/assets/javascripts/main.coffee"
output_dir = "./assets/"

desc "Compile Sass and CoffeeScript"
task :compile => [:clean, :sass, :coffee] do
  
end

desc "Compile Sass for production"
task :sass do
  puts `sass #{scss_file}:#{File.join output_dir, "stylesheets/master.css" } -r ./theme/assets/stylesheets/bourbon/lib/bourbon.rb -f -t compressed`
  puts "* Sass compiled for production"
end


desc "Compile CoffeeScript for production"
task :coffee do
  puts `coffee -o #{File.join output_dir, "javascripts"} -c #{js_file}`
  puts "* CoffeeScript compiled"
end

desc "Clean the JS and CSS output dirs"
task :clean do
  puts `rm -rf ./assets/javascripts/main.js ./assets/stylesheets/master.css tmp/*`
  puts "* Clean"
end

desc "Deploys to johanbrook.com. Auto-compile and commit all SCSS and Coffee files."
task :deploy => [:compile] do
  files = [
    "theme/assets/stylesheets",
    "theme/assets/javascripts",
    File.join(output_dir, "stylesheets/master.css"),
    File.join(output_dir, "javascripts/main.js")
  ]
  
  puts `git add #{output_dir}`
  puts `git commit #{files.join(" ")} -m "*Deploy* (Force compile SCSS and CoffeeScript files)"`
        
  puts `git push origin master`
  puts "* Deployed"
end