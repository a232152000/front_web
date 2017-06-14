import requests # pip install requests
import facebook
import datetime
import json
import sys
from datetime import timedelta

def getFanPagePosts(fanPage, getTime):
    posts=[]
    print(fanPage)
    getPosts(fanPage, posts, graphApi.get_object(fanPage, fields="posts{created_time,message,id}")["posts"], getTime)

def getPosts(fanPage, posts, postsInfo, getTime):
    posts += [posts
             for posts in postsInfo["data"]
             if "data" in postsInfo]
    print(len(posts))
    inTimePosts = [post#["created_time"]
                 for post in posts
                 if datetime.datetime.strptime(post["created_time"], "%Y-%m-%dT%H:%M:%S+%f")>=getTime]
    print(len(inTimePosts))
    if len(inTimePosts) == len(posts):
        if "next" in postsInfo["paging"]:
            getPosts(fanPage, posts, requests.get(postsInfo["paging"]["next"]).json(), getTime)
    else:
        fanPagePosts[fanPage] = inTimePosts



ACCESS_TOKEN= sys.argv[1]
broadCasters=["SenYeYeZi", "6tantan", "LeggyReki", "rdhose", "LNGniaws", "chrisop999", "yuniko0720", "WannaSinging", "opchanneltw", "Heavenknowslol"]
fanPagePosts={}

print("---------------")
print("get GraphApi")
graphApi = facebook.GraphAPI(ACCESS_TOKEN)
print("---------------")
print("get fanpage post")
for name in broadCasters:
    getFanPagePosts(name, datetime.datetime(2017, 5, 1))

def getGameList(gamefile):
    with open(gamefile, "r") as f:
        allGame = f.readlines()
        gameList=[]
        for game in allGame:
            gameList.append(game.strip('\n').split('|'))
    f.close()
    return gameList

gameList=[]
gameList=getGameList("gameList.txt")

def Game(people_post,game_list):
    people_game = {}

    for j in game_list:
        people_game[j[0]] = 0

    for i in range(len(people_post)):
        for j in game_list:
            for k in j:
               if(k in people_post[i]):
                   people_game[j[0]] =people_game[j[0]] + 1
                   break
    return people_game

people = {}
for name in broadCasters:
    message = [posts['message'] for posts in fanPagePosts[name] if 'message' in posts]
    game_count = Game(message,gameList)
    people[name] = game_count

def Game_People_Json(people,game_list,broadCasters):
    game_people = {}
    for i in game_list:
        garbage = {}
        for j in broadCasters:
            garbage[j] = people[j].get(i[0])
            #print(garbage[j])

            #print(game_people[i[0]])
        gg = sorted(garbage.items(), key=lambda d:d[1], reverse = True)
        game_people[i[0]] = gg

    return game_people
game_people_json={}
game_people_json = Game_People_Json(people,gameList,broadCasters)
with open('FanPage.json', 'w') as fp:
        json.dump(game_people_json, fp)
#print(json.dump(game_people_json))
#匯出封面+頭圖
Pic_CovUrl={}
def getFanPagePictureAndCoverUrl(fanPage):
    creatTime = [posts['created_time'] for posts in fanPagePosts[fanPage] if 'created_time' in posts]
    newPost = datetime.datetime.strptime(creatTime[0], "%Y-%m-%dT%H:%M:%S+%f")
    newPost = newPost + timedelta(0, 8*60*60)
    oldPost = datetime.datetime.strptime(creatTime[-1], "%Y-%m-%dT%H:%M:%S+%f")
    postTime = str(newPost.year)+"年"+str(newPost.month)+"月"+str(newPost.day)+"日 "+str(newPost.hour)+"點"+str(newPost.minute)+"分 到 "+str(oldPost.year)+"年"+str(oldPost.month)+"月"+str(oldPost.day)+"日 "+str(oldPost.hour)+"點"+str(oldPost.minute)+"分"
    url={}
    url["picture"] = "http://graph.facebook.com/" + fanPage + "/picture?type=large"
    url["cover"] = graphApi.get_object(fanPage, fields="cover")["cover"]["source"]
    url["post_time"] = postTime
    Pic_CovUrl[fanPage] = url
for name in broadCasters:
    getFanPagePictureAndCoverUrl(name)

with open('FanPagePictureAndCoverUrl.json', 'w') as fp:
        json.dump(Pic_CovUrl, fp)
