#! /usr/bin/env sh

DATE=$(date)

for f in $(git status -u -s | sed 's|?? ||g'); do
	echo git add -v "$f"
	git add -v "$f"
	#sleep 1s
	echo git commit -am "checkin $f $DATE"
	git commit -am "checkin $f $DATE"
	echo git push --all
	git push --all
done

find ./dists -type f -name 'Contents*' -exec ./add.sh {} \;
