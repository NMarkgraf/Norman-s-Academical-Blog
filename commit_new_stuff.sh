#!/usr/bin/env bash
mergetext="Update: $1"
git add static/*
git add public/*
git add content/*
git commit -m "$mergetext"
git push