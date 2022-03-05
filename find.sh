#! /usr/bin/env sh

DATE=$(date)

for f in $(git status -u | grep dists); do
	git add -v "$f"
	git commit -am "checkin $f $DATE"
	git push --all
done

for f in $(git status -u | grep changelog); do
	git add -v "$f"
	git commit -am "checkin $f $DATE"
	git push --all
done

for f in $(git status -u | grep changelog); do
	git add -v "$f"
	git commit -am "checkin $f $DATE"
	git push --all
done

find ./dists -type f -name 'Contents*' -exec ./add.sh {} \;
