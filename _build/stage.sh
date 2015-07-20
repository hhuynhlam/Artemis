# clean and build local_dist
pushd ../client
gulp jade && gulp less-production
gulp clean
gulp build-stage

# create package
mkdir ../_dist
cp -a ./_dist ../_dist/client
cd ../
cp -a ./server ./_dist/server
tar -zcf package.tar ./_dist
gzip package.tar 

# copy to host
scp -C package.tar.gz hhuynhlam@208.113.211.21:~/

# host commands
ssh -t -t hhuynhlam@ps446130.dreamhostps.com << 'EOF'

    sudo mv package.tar.gz ./www
    cd www
    sudo rm -rf aphio
    
    sudo gunzip package.tar.gz
    sudo tar -xvf package.tar
    sudo rm package.tar
    
    sudo mv _dist aphio
    sudo rm -rf client
    sudo rm -rf server

    sudo mkdir aphio/server/app
    sudo cp _config/aphio_config.php aphio/server/app/config.php
    exit 0

EOF

# cleanup
rm -rf ./_dist
rm package.tar.gz
