require "rake"

scss_file = "./theme/assets/stylesheets/master.scss"
coffee_file = "./theme/assets/javascripts/main.js.coffee"
css_file = "./assets/stylesheets/master.css"
js_file = "./assets/javascripts/main.js"

desc "Compile Sass and CoffeeScript"
task :compile => [:clean, :sass, :coffee] do
  
end

desc "Compile Sass for production"
task :sass do
  puts `sass #{scss_file}:#{css_file} -r ./theme/assets/stylesheets/bourbon/lib/bourbon.rb -f -t compressed`
  puts "* Sass compiled for production"
end


desc "Compile CoffeeScript for production"
task :coffee do
  puts `coffee -o ./assets/javascripts -c #{coffee_file}`
  File.rename js_file+".js", js_file
  puts "* CoffeeScript compiled"
end

desc "Clean the JS and CSS output dirs"
task :clean do
  puts `rm -rf #{js_file} #{css_file} tmp/*`
  puts "* Clean"
end

desc "Deploys to johanbrook.com. Auto-compile and commit all SCSS and Coffee files."
task :deploy => [:compile] do
  files = [
    css_file,
    js_file
  ]
  
  puts `git add #{files.join(" ")}`
  puts `git commit #{files.join(" ")} -m "*Deploy* (Force compile SCSS and CoffeeScript files)"`
        
  puts `git push origin master`
  puts "* Deployed"
end