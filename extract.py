import nltk
from nltk.corpus import PlaintextCorpusReader
corpus_root = '/home/vivkul/Downloads/project'
wordlists = PlaintextCorpusReader(corpus_root, '.*')
# wordlists.fileids()
# wordlists.words('questions.txt')
amrit=wordlists.words('allquestion.txt')
stopwords = nltk.corpus.stopwords.words('english')
from nltk.book import *
fo=open("selectedquestion.txt","wb")
a=wordlists.sents('allquestion.txt')
while(len(amrit)!=0):
	content=[w for w in amrit if w.lower() not in stopwords]
	voc=FreqDist(content)
	# sorted([w for w in set(content) if len(w) > 2 and 4voc[w] > 3])
	# set_voc_0=FreqDist(a[0])
	# set_voc_1=FreqDist(a[1])
	b=voc.keys()
	i=0
	while(i<len(b)):
		if(len(b[i])>2):
			j=i
			max=b[i]
			break
		i=i+1
	q_no=[]
	k=0
	while(k<len(a)):
		set_voc=FreqDist(a[k])
		if(set_voc[max]>0):
			q_no.append(len([w for w in a[k] if w.lower() not in stopwords]))
		else:
			q_no.append(0)
		k=k+1
	e=FreqDist(q_no)
	f=sorted(e.keys())
	g=f[len(e.keys())-1]
	l=0
	while(l<len(a)):
		if(q_no[l]==g):
			string=' '.join(a[l])			
			fo.write(string)
			fo.write("\n")
			break
		l=l+1
	b=[]
	n=0
	m=0
	while(m<len(a)):
		if(q_no[m]==0):
			b.append(a[m]) 
			n=n+1
		m=m+1
	if(len(b)!=0):
		a=b
		c=a[0]
		o=1
		while(o<n):
			c=c+a[o]
			o=o+1
		amrit=c
	else:
		amrit=[]
fo.close()
