
# build the API docs

# first you need to:
# `$ sudo npm install -g readme-docs`
# (make sure you're using v0.1.0 or greater by checking with:
# `$ readme-docs --version`

# now we build to the /build folder

readme-docs -t 'NetDNA API Docs' -g https://github.com/netdna/netdna-apidocs -c custom.css

# now copy the build folder, paste elsewhere for now, checkout gh-pages, and move in the build
mkdir -p ~/tmp/build/
mv build/* ~/tmp/build/
git checkout gh-pages
cp -R ~/tmp/build/* .
rm -rf ~/tmp/build
git add .
git commit -m 'updated api docs via make'
git push origin gh-pages

git checkout master
