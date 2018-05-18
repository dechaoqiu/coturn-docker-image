<? $var = getopt('', ['image_tags:']); ?>
#!/bin/bash
# AUTOMATICALLY GENERATED
# DO NOT EDIT THIS FILE DIRECTLY, USE /post_push.tmpl.php

set -e

# Parse image name for repo name
tagStart=$(expr index "$IMAGE_NAME" :)
repoName=${IMAGE_NAME:0:tagStart-1}

# Tag and push image for each additional tag
for tag in {<?= $var['image_tags']; ?>}; do
  docker tag $IMAGE_NAME ${repoName}:${tag}
  docker push ${repoName}:${tag}
done