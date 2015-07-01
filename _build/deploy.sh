npm install -g gulp
GULP=$(which gulp)

# check for params
if [ -z "$HOST" ];
then
    echo "error: HOST not defined"
    exit 1
fi
if [ -z "$USER" ];
then
    echo "error: USER not defined"
    exit 1
fi
if [ -z "$PASS" ];
then
    echo "error: PASS not defined"
    exit 1
fi

# clean and build local_dist
pushd ../client
GULP jade && GULP less-production
GULP clean
GULP build

# connect to host and copy files over
lftp -u $USER,$PASS $HOST << EOF

cd Sites/beta

rm -r client

mirror -R ./_dist client

bye
EOF
