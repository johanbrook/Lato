require "rake"

scss_file = "./theme/assets/stylesheets/master.scss"
coffee_file = "./theme/assets/javascripts/main.js.coffee"
css_file = "./assets/stylesheets/master.css"
js_file = "./assets/javascripts/main.js"

files = [
  css_file,
  js_file
]

desc "Compile Sass and CoffeeScript"
task :compile => [:clean, :sass, :coffee] do
  
end

desc "Compile Sass for production"
task :sass do
  puts `sass #{scss_file}:#{css_file} -r ./theme/assets/stylesheets/bourbon/lib/bourbon.rb -f -t compressed`
  puts "* #{File.basename scss_file} compiled for production to #{File.basename css_file}"
end


desc "Compile CoffeeScript for production"
task :coffee do
  puts `coffee -o ./assets/javascripts -c #{coffee_file}`
  File.rename js_file+".js", js_file
  puts "* #{File.basename coffee_file} compiled to #{File.basename js_file}"
end

desc "Clean the JS and CSS output dirs"
task :clean do
  puts `rm -rf #{files.join(" ")} tmp/*`
  puts "* Cleaned #{files.map { |file| File.basename file}.join(", ") }"
end

desc "Deploys to johanbrook.com. Auto-compile and commit all SCSS and Coffee files."
task :deploy => [:compile] do
  date = Time.now.strftime "%A %Y-%m-%d %H:%M"
  puts `git add #{files.join(" ")}`
  puts `git commit #{files.join(" ")} -m "Deployed on #{date}"`
        
  puts `git push origin master`
  puts "* Deployed"
end